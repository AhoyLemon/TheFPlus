# cover-image

[![Kirby CMS](https://img.shields.io/badge/Kirby_5+-000?style=for-the-badge&logo=kirby&logoColor=fff&labelColor=000&color=222)](https://getkirby.com/)
[![PHP](https://img.shields.io/badge/PHP_8.1+-000?style=for-the-badge&logo=php&logoColor=000&labelColor=777BB4&color=222&logoSize=auto)](https://www.php.net/)

A Kirby 5 plugin that adds a `coverImage()` page method returning a **stable, human-readable URL** for any page's primary image file.

Kirby 5's built-in media URLs contain rotating content tokens, e.g.:

```
/media/pages/episode/415/b8ecb85894-1768600774/ep415.jpg
```

This plugin replaces those with clean, permanent URLs under a dedicated `/coverimage/` namespace:

```
/coverimage/episode/415/ep415.jpg
/coverimage/meet/stocking/stocking.jpg
/coverimage/also-made/some-project/thumb.png
```

The `/coverimage/` prefix keeps the route completely isolated — it cannot interfere with normal page routing, query strings, or any other Kirby functionality.

---

## Installation

1. **Copy** (or symlink) the `cover-image` folder into `site/plugins/`:

   ```
   site/
   └── plugins/
       └── cover-image/
           ├── index.php
           └── README.md
   ```

2. **Add the file-serving route** to `site/config/config.php`. It uses a dedicated `coverimage/(:all)` pattern so it is completely safe and cannot shadow any normal page routes.

   ```php
   'routes' => [
       // COVER-IMAGE FILE SERVING
       [
           'pattern' => 'coverimage/(:all)',
           'action'  => function (string $path) {
               $lastSlash = strrpos($path, '/');
               if ($lastSlash === false) return null;

               $filename = substr($path, $lastSlash + 1);
               $pagePath = substr($path, 0, $lastSlash);

               $parentPage = page($pagePath);
               if (!$parentPage) return null;

               $file = $parentPage->file($filename);
               if ($file && file_exists($file->root())) {
                   header('Content-Type: '   . $file->mime());
                   header('Content-Length: ' . filesize($file->root()));
                   header('Cache-Control: public, max-age=31536000, immutable');
                   header('Last-Modified: '  . gmdate('D, d M Y H:i:s', filemtime($file->root())) . ' GMT');
                   readfile($file->root());
                   exit;
               }

               return null;
           }
       ],
       // ... other routes
   ],
   ```

   > **Route placement:** `coverimage/(:all)` is a specific pattern and can be placed anywhere in the routes array without affecting other routes.

---

## Usage

Call `$page->coverImage()` anywhere you would previously use `$page->image()->url()` or `$page->cover()->toFile()->url()`.

### In a template

```php
<?php if ($url = $page->coverImage()): ?>
  <img src="<?= $url ?>" alt="<?= $page->title() ?>" />
<?php endif ?>
```

### In a snippet

```php
<img src="<?= $article->coverImage() ?>" alt="<?= $article->title() ?>" />
```

### In JSON-LD / structured data

```php
"image": "<?= $page->coverImage() ?>"
```

---

## Resolution order

| Priority | Source | Condition |
|----------|--------|-----------|
| 1 | `cover` content field | Field is non-empty and the referenced filename resolves to an attached file |
| 2 | First attached image | Page has one or more images in its content folder |
| 3 | `null` | Neither of the above — guard with `if ($url = $page->coverImage())` |

---

## Requirements

- Kirby 5.x
- PHP 8.1+