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