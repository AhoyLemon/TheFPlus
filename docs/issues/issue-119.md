# Chore: Simplify Sass & JS rigging

## Currently

- This site is using Prepros for compiling Sass and JS. This is totally fine, but adds an extra step to the workflow.

## Proposal

- [ ] Instead of that, let's use bun to handle our client side TS/JS, Sass concatonation, and hot reloading (likely via browser-sync). This should hopefully simplify the workflow.
- [ ] While we're at it, let's remove jquery as dependency for the frontend. There isn't a lot of javascript in the frontend at all, so it should be simple to rewrite.
- [ ] And since we're doing that, let's have the `assets\js` folder try to use TypeScript instead.
  - [ ] Recognize there's a `assets\js\vendor` directory, that can stay as is.
  - [ ] But make sure the `assets\js\partials\_meet.js` file is rewritten in TypeScript and and either imported into the build script or compiled separately and used on the `meet.php` template

## Implementation Notes

- [ ] Likely we'll need to adjust some `.scss` files to avoid deprecated features, such as converting `@import` to `@use` and `@forward`. This is a good opportunity to clean up the Sass codebase and make it more maintainable.
- [ ] I do want the terminal to give me some feedback of build success/failure when I hit save.
- [ ] I also want to make sure that the hot reloading is working correctly, so that when I save a file, the browser automatically refreshes to show the changes.
- [ ] PLEASE RECOGNIZE that the project is PHP based, so that will be building our pages. So really we're only hot-reloading the compiled CSS and JS files, not the HTML.
- [ ] Ignore the `kirby`, `media`, and `site` folders. Really, the only directory we care about here is `assets` and folders/files within that.
- [ ] I am using [Laragon](https://laragon.org) for local development.
- [ ] The local url is `http://thefplus.test` and the production url is `https://thefpl.us`. So make sure to adjust any hardcoded urls in the JS files to reflect that.

## References

- [This PR](https://github.com/AhoyLemon/startHere/pull/4) converted a pug/vue/js project using Prepros to a pug/vue/js project using bun.
- [This PR](https://github.com/AhoyLemon/damn.dog/pull/45) did the same, but this one handled a lot of JS=>TS as well as handling the new sass conventions.

## Goals

- [ ] SIMPLICITY over everything else. Please no complicated solutions.
- [ ] Prefer `bun` over `npm`
- [ ] Smaller build files.
- [ ] Easy deployment.
- [ ] Updated documentaition
- [ ] No more prepros
- [ ] No more jquery

## Bonus Tasks

- [ ] Identify files that are no longer necessary and remove them
- [ ] Fun and cute messaging in the terminal when the watch command is running, and when builds succeed/fail. Maybe even a little ascii art?
- [ ] A few automated tests for TS and Sass compilation, making sure we're not using deprecated features
- [ ] Update README.md with new build instructions and workflow.

## Change Requests

- 😍 I LOVE the "THE F PLUS" thing that comes up when you run `bun run dev` that looks incredible. With the slogan too, that's great.
- [ ] Can you have that at the end (after "watching for changes"), followed by a table of the URLs you can/should use for local development?
- [ ] I edited some .scss - I only saw the results after refreshing. Is that something that can hot reload? Or would that overcomplicate matters?
- [ ] I edited `assets\sass\partials\_main.scss` and I did see the change after I hit refresh. However, when I look in the browser inspector, it tells me the source is `http://thefplus.test/assets/css/thefplus.css?updated=2026-01-16T16:04` - Can you make sure that everything is sourcemapped locally so I can see where I should make sass partial changes?
- [ ] Same with the JS - I edited `assets\js\src\thefplus.ts` and I only saw the change after refreshing. Can we have that hot reload as well? And also make sure it's sourcemapped so I can see where to make changes in the source files?
- [ ] Can you add a github workflow that does the production build for js/ts when there's a push to main? Wanna make sure the prod css always ends up in prod.
- [ ] FWIW, I see `1 vulnerabilities (1 high)` when I run `bun audit` - Is that addressable?
- [x] ALSO, please document how you think the best way would be to manage produciton css. While I want to make sure that the prod css is minified and deployed from the repo, I'd also like to keep in mind developers who could get merge conflicts from build .css files that don't matter. I guess just document here (in this file) how you think that should be handled.

## Resolution Notes

### Hot reloading

browser-sync **already injects CSS without a page reload** — that's a core feature. The key is you must browse via the browser-sync proxy URL, not `http://thefplus.test` directly. When you run `bun run dev`, a URL table is shown in the terminal:

- **Hot reload → `http://localhost:3000`** — CSS injects live, JS triggers a reload
- No hot reload → `http://thefplus.test` — direct PHP, no browser-sync involved

If you were only seeing changes after a manual refresh, you were likely on the direct PHP URL.

### Source maps

`bun run dev` now produces:

- **Sass**: `--style=expanded --embed-sources` — embed full source maps so the browser DevTools inspector shows the exact Sass partial and line number (not the compiled CSS)
- **TypeScript**: `sourcemap: "inline"` with no minification — same thing, shows your `.ts` source in DevTools

`bun run build` still produces minified, no-source-map output for production.

### ASCII art / URL table

The greeting + URL table now appear **after** browser-sync has started, so you see the URLs once watching is actually active. Initial build output still shows first so any errors are visible before the art.

### GitHub Actions workflow

Added `.github/workflows/build.yml`. It triggers on any push to `main` that touches `assets/sass/`, `assets/js/src/`, `package.json`, or `bun.lockb`. It:

1. Checks out the repo
2. Sets up Bun
3. Runs `bun install --frozen-lockfile`
4. Runs `bun run build`
5. Commits `assets/css/` and `assets/js/thefplus.min.js` back with the message `chore: build assets [skip ci]`

The `[skip ci]` tag prevents the commit from triggering another build loop.

### Production CSS strategy

**TL;DR: Commit compiled CSS/JS to the repo, but only let CI write them.**

#### Why commit compiled assets at all?

The server is Kirby/PHP — there's no Node.js build step on deploy. Compiled CSS and JS must already be in the repository for the site to work after a `git pull`. The GitHub Actions workflow handles regenerating them on every push to `main`.

#### How to avoid merge conflicts

The rule is simple: **developers never commit `assets/css/*.css` or `assets/js/thefplus.min.js` directly.** Only commit your Sass and TypeScript source changes. CI will build and commit the compiled output.

Practically:

- Run `bun run dev` while working. The compiled files will be updated locally, but **don't `git add` them**.
- Commit only the `.scss` and `.ts` files you changed.
- Push to `main` (or open a PR that merges to `main`).
- The GitHub Actions workflow runs `bun run build` and pushes back the fresh compiled files.

If you accidentally stage compiled CSS/JS, you can un-stage with:

```sh
git restore --staged assets/css/ assets/js/thefplus.min.js
```

A `.gitattributes` entry (see root `.gitattributes`) marks the built files as "generated" so GitHub hides them from PR diff views and language statistics.

#### What if a conflict does happen?

If two branches both modified Sass and both committed compiled CSS (ideally they shouldn't), resolving the conflict is trivial — always take the latest build:

```sh
git checkout --theirs assets/css/thefplus.css
git add assets/css/thefplus.css
```

The "correct" compiled file is always whatever `bun run build` produces from your current source.

### Vulnerability fix (`bun audit`)

The CVE was `minimatch < 10.2.1` (ReDoS) in the chain `browser-sync → resp-modifier → minimatch@^3.0.2`. browser-sync@3.0.4 (latest) still ships the old version. Addressed with a Bun override in `package.json`:

```json
"overrides": {
  "minimatch": "^10.2.1"
}
```

`bun audit` now reports **no vulnerabilities**. This is a dev-only dependency so there was never a production risk.
