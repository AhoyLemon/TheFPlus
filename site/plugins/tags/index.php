<?php

/**
 * tags plugin
 *
 * Adds a $site->tagCounts(array $slugs = []) method that returns
 * [ tagName => count ] sorted by count descending.
 *
 * Tag filtering uses plain query strings (?tag=value) so no custom
 * route is needed — /tags?tag=paranoia renders the tagcloud template
 * as a normal Kirby page.
 */

Kirby::plugin('ahoylemon/tags', [

    // No custom routes needed.
    // Tag filtering uses a plain query string — e.g. /tags?tag=paranoia —
    // so /tags resolves as a normal Kirby page and the query string is read
    // in the tagcloud template via:  kirby()->request()->get('tag')

    // ------------------------------------------------------------------
    // $site->tagCounts(array $slugs = [])
    //
    // Returns [ 'tagName' => int $count, ... ] sorted by count descending.
    // Scans all listed grandchildren by default. Pass top-level page slugs
    // to limit scope, e.g. $site->tagCounts(['episode', 'also-made']).
    // ------------------------------------------------------------------
    'siteMethods' => [
        'tagCounts' => function (array $slugs = []): array {
            /** @var \Kirby\Cms\Site $this */

            if (empty($slugs)) {
                $pages = $this->grandChildren()->listed();
            } else {
                $collection = new \Kirby\Cms\Pages();
                foreach ($slugs as $slug) {
                    $section = $this->find($slug);
                    if ($section) {
                        $collection = new \Kirby\Cms\Pages(
                            array_merge($collection->data(), $section->children()->listed()->data())
                        );
                    }
                }
                $pages = $collection;
            }

            $counts = [];
            foreach ($pages as $page) {
                if ($page->tags()->isEmpty()) continue;
                foreach (str_getcsv((string)$page->tags()) as $raw) {
                    $tag = trim($raw);
                    if ($tag === '') continue;
                    $counts[$tag] = ($counts[$tag] ?? 0) + 1;
                }
            }

            arsort($counts);
            return $counts;
        },
    ],

]);
