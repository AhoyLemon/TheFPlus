# The F Plus

[![Last Deploy](https://img.shields.io/github/last-commit/AhoyLemon/TheFPlus?label=Last%20Deploy&style=for-the-badge&color=green&logo=github&logoColor=white)](https://github.com/AhoyLemon/TheFPlus/actions)
[![Live Site](https://img.shields.io/badge/Live%20Site-thefpl.us-blue?style=for-the-badge&logo=globe&logoColor=white)](https://thefpl.us)
[![Website](https://img.shields.io/website?url=https%3A%2F%2Fthefpl.us&style=for-the-badge)](https://thefpl.us)
[![License: CC BY 4.0](https://img.shields.io/badge/License-CC%20BY%204.0-white?style=for-the-badge&logoColor=white&logo=creativecommons)](LICENSE)

This repository contains all files powering [thefpl.us](https://thefpl.us), a website built on [Kirby CMS](https://github.com/getkirby/kirby/). The site content and architecture are versioned here for transparency and development.

## Requisites

- **[PHP 8.2+](https://www.php.net/)** (required)
  - Several Required Extensions [see requirements](https://getkirby.com/docs/reference/system/requirements#php-extensions)
- **[Apache or Nginx](https://httpd.apache.org/)** (for production)
- **[Laragon](https://laragon.org/)** (recommended for local development)

## Made with

[![Kirby CMS](https://img.shields.io/badge/Kirby_5.2+-000?style=for-the-badge&logo=kirby&logoColor=fff&labelColor=000&color=222)](https://getkirby.com/)
[![PHP](https://img.shields.io/badge/PHP_8.2+-000?style=for-the-badge&logo=php&logoColor=000&labelColor=777BB4&color=222&logoSize=auto)](https://www.php.net/)
[![YAML](https://img.shields.io/badge/YAML-000?style=for-the-badge&logo=yaml&logoColor=fff&labelColor=CB171E&color=222)](https://yaml.org/)
[![Sass](https://img.shields.io/badge/Sass-000?style=for-the-badge&labelColor=CC6699&logo=sass&logoColor=fff&color=222)](https://sass-lang.com/)
[![TypeScript](https://img.shields.io/badge/TypeScript-000?style=for-the-badge&logo=typescript&logoColor=fff&labelColor=3178C6&color=222)](https://www.typescriptlang.org/)
[![RSS](https://img.shields.io/badge/RSS-000?style=for-the-badge&logo=rss&logoColor=fff&labelColor=FFA500&color=222)](https://www.rssboard.org/rss-specification)
[![Git](https://img.shields.io/badge/Git-000?style=for-the-badge&logo=git&logoColor=fff&labelColor=F05032&color=222)](https://git-scm.com/)
[![Apache](https://img.shields.io/badge/Apache-000?style=for-the-badge&logo=apache&logoColor=fff&labelColor=D22128&color=222)](https://httpd.apache.org/)
[![Matomo](https://img.shields.io/badge/Matomo-000?style=for-the-badge&labelColor=3152A0&logo=matomo&logoColor=fff&color=222&logoSize=auto)](https://matomo.org/)
[![Disqus](https://img.shields.io/badge/Disqus-000?style=for-the-badge&labelColor=2E9FFF&logo=disqus&logoColor=fff&color=222&logoSize=auto)](https://disqus.com/)
[![Laragon](https://img.shields.io/badge/Laragon-000?style=for-the-badge&labelColor=0E83CD&logo=laragon&logoColor=fff&color=222)](https://laragon.org/)
[![Bun](https://img.shields.io/badge/Bun-000?style=for-the-badge&logo=bun&logoColor=fff&labelColor=000000&color=222&logoSize=auto)](https://bun.sh/)

## Local Development

1. Clone the repository:
   ```sh
   git clone https://github.com/AhoyLemon/TheFPlus.git
   ```
2. (Recommended) Install [Laragon](https://laragon.org) and point it at your folder — the local dev URL is `http://thefplus.test`.
3. Make sure you have PHP 8.2+ and Apache running in your local environment.
4. Start your local server (Laragon, XAMPP, or similar).
5. Visit [thefplus.test](http://thefplus.test) in your browser.

## Frontend Assets

Sass and TypeScript are compiled via [Bun](https://bun.sh). Install it from [bun.sh](https://bun.sh) if you haven't already.

**Install dependencies:**

```sh
bun install
```

**Watch mode** (compiles Sass + TypeScript on save, browse at http://thefplus.test — refresh to see changes):

```sh
bun run dev
```

**Production build** (compressed CSS, minified JS):

```sh
bun run build
```

### Asset Structure

| Source                      | Output                      |
| --------------------------- | --------------------------- |
| `assets/sass/thefplus.scss` | `assets/css/thefplus.css`   |
| `assets/js/src/thefplus.ts` | `assets/js/thefplus.min.js` |

Sass partials live in `assets/sass/partials/`. The `_shared.scss` partial forwards variables, mixins, extends, and z-index values to every partial that needs them via `@use 'shared' as *;`.

TypeScript source lives in `assets/js/src/`. Vendor scripts (e.g., Podlove player, Chartist) remain in `assets/js/vendor/` and are left untouched.

## Deployment

**Status: TBD**

> **Note:** Currently, deployment is handled via FTP. We're working to integrate this with the Git repository workflow, allowing you to push locally and pull on the remote server for automated deployment.

> Reference [boozAdmin](https://github.com/AhoyLemon/boozAdmin) (specifically the [DEPLOY.md](https://github.com/AhoyLemon/boozAdmin/blob/main/DEPLOY.md) file) for the intended deployment process once it's implemented.

## Contributing

If you have suggestions or improvements, please [submit an issue](https://github.com/AhoyLemon/TheFPlus/issues) or contact Lemon before submitting a pull request.

## Stats

[![Open Issues](https://img.shields.io/github/issues/AhoyLemon/TheFPlus?label=Issues&style=for-the-badge&color=orange)](https://github.com/AhoyLemon/TheFPlus/issues)
[![Closed Issues](https://img.shields.io/github/issues-closed/AhoyLemon/TheFPlus?label=&style=for-the-badge&color=222)](https://github.com/AhoyLemon/TheFPlus/issues?q=is%3Aissue+is%3Aclosed)
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
[![Open PRs](https://img.shields.io/github/issues-pr/AhoyLemon/TheFPlus?label=Pull%20Requests&style=for-the-badge&color=orange)](https://github.com/AhoyLemon/TheFPlus/pulls)
[![Closed PRs](https://img.shields.io/github/issues-pr-closed/AhoyLemon/TheFPlus?label=&style=for-the-badge&color=222)](https://github.com/AhoyLemon/TheFPlus/pulls?q=is%3Apr+is%3Aclosed)
