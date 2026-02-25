<?php

/**
 * cover-image plugin
 *
 * Adds a coverImage() page method that returns a stable, human-readable URL
 * for any page's cover image, using the page's own URL as the base path:
 *
 *   /episode/415/ep415.jpg
 *   /meet/stocking/stocking.jpg
 *   /also-made/some-project/thumb.png
 *
 * This keeps image URLs permanent and independent of Kirby's internal
 * media-token system, which rotates on every content change.
 *
 * A companion route in config.php intercepts these URLs and streams
 * the file directly from the content folder.
 */

Kirby::plugin('thefplus/cover-image', [
    'pageMethods' => [

        /**
         * coverImage() – returns the clean public URL for the page's primary image.
         *
         * Resolution order:
         *   1. `cover` field  – a filename string pointing to an attached file.
         *   2. First image attached to the page.
         *   3. Returns null if neither exists.
         *
         * The URL produced is always:  {page-url}/{filename}
         * e.g.  https://thefpl.us/episode/415/ep415.jpg
         *
         * @return string|null
         */
        'coverImage' => function (): ?string {
            /** @var \Kirby\Cms\Page $this */

            // 1. Prefer an explicit cover field (stores a filename reference)
            if ($this->cover()->isNotEmpty() && ($f = $this->cover()->toFile())) {
                return url('coverimage/' . $this->uri() . '/' . $f->filename());
            }

            // 2. Fall back to the first image attached to the page
            if ($img = $this->images()->first()) {
                return url('coverimage/' . $this->uri() . '/' . $img->filename());
            }

            // 3. Nothing found
            return null;
        },

    ],
]);
