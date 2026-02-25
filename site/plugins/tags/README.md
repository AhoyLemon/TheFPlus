# tags

[![Kirby CMS](https://img.shields.io/badge/Kirby_5+-000?style=for-the-badge&logo=kirby&logoColor=fff&labelColor=000&color=222)](https://getkirby.com/)
[![PHP](https://img.shields.io/badge/PHP_8.1+-000?style=for-the-badge&logo=php&logoColor=000&labelColor=777BB4&color=222&logoSize=auto)](https://www.php.net/)

A Kirby 5 plugin that replaces the deprecated Kirby 2 `tagcloud()` helper.

Provides a `$site->tagCounts()` site method used by the `tagcloud` template to render both a full tag cloud and filtered tag results — all in one page, no custom routes required.

```
/tags               → full tag cloud, sorted by usage count
/tags?tag=paranoia  → all pages tagged "paranoia"
/tags?tag=great+britain → all pages tagged "great britain"
```

---

## Requirements

- Kirby 5.x
- PHP 8.1+
- A content page at the slug `tags` using the `tagcloud` template

---

## Installation

Copy (or symlink) the `tags` folder into `site/plugins/`:

```
site/
└── plugins/
    └── tags/
        ├── index.php
        └── README.md
```

No composer step required. Kirby auto-loads all plugins in `site/plugins/`.

---

## How it works

Kirby 5 removed the `tagcloud()` helper that existed in Kirby 2. This plugin
replaces it with a `$site->tagCounts()` method that scans all listed pages
for comma-separated `tags` fields and returns a frequency map.

Tag filtering uses a plain `?tag=` query string rather than Kirby 2's `key:value`
URL param style (e.g. `/find/tag:foo`). This avoids routing complications entirely
— `/tags` is a normal Kirby page, and `?tag=` is read directly from the request.

---

## `$site->tagCounts(array $slugs = [])`

Returns `[ 'tagName' => count ]` sorted by count descending.

```php
// Scan all listed pages
$tags = $site->tagCounts();

// Limit to specific top-level sections
$tags = $site->tagCounts(['episode', 'also-made']);
```

Tags are split on commas and each value is trimmed. Empty values are ignored.

---

## Template: `site/templates/tagcloud.php`

The template handles both views based on whether `?tag=` is present in the request.

```php
$activeTag = trim(strip_tags(kirby()->request()->get('tag') ?? ''));
```

**No tag → full cloud:**

```php
<?php foreach ($site->tagCounts() as $tagName => $count): ?>
  <a class="tag" href="<?= $site->url() ?>/tags?tag=<?= rawurlencode($tagName) ?>">
    <span class="tag-name"><?= html($tagName) ?></span>
    <span class="tag-count"><?= $count ?></span>
  </a>
<?php endforeach ?>
```

**Tag present → filtered results:**

```php
$articles = $site->grandChildren()->listed()
  ->filterBy('tags', $activeTag, ',')
  ->sortBy('date', 'desc')
  ->paginate(15);
```

The filtered view includes a back link to `/tags` and paginates at 15 results.

---

## Snippet: `site/snippets/tags.php`

Tags on individual pages (episodes etc.) link to `/tags?tag=value`. Tags used
only once are rendered as plain non-linked text. The special tag `merch` always
links to `/merch` instead.

```php
echo '<a href="' . $site->url() . '/tags?tag=' . urlencode($tag) . '">' . $tag . '</a>';
```

---

## Content folder

The `tags` page needs a content file. The filename determines the template:
`tagcloud.txt` → Kirby uses `site/templates/tagcloud.php`.

Example `content/14_tags/tagcloud.txt`:

```
Title: Tag Cloud

----

Text: This page lists all tags used across the site.
```

The numeric prefix (`14_`) controls the page's position in navigation.
