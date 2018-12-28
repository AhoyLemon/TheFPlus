<div class="episode-actions">
  <!-- DOWNLOAD FILE -->
  <?php if ($page->episode_file() != ""): ?>
    <a itemprop="audio" class="action download" href="<?= $site->url(); ?>/podcasts/<?php echo $page->episode_file() ?>" download title="Download episode">
      <svg viewBox="0 0 100 100">
        <path d="M81.2 49.4c0 7.7-6.3 13.9-13.9 13.9h-5.6v-6.1h5.6c4.4 0 7.9-3.6 7.9-7.9 0-5.4-3.6-8.2-7.5-8.2-.2-9-6.1-12.9-11.9-12.9-7.6 0-10.8 5.8-11.5 8-3.1-4.5-11.5-1.1-9.8 4.9-5.3-.9-9.4 3-9.4 8.2 0 4.4 3.6 7.9 8.1 7.9h7.7v6.1h-7.7C25.3 63.3 19 57 19 49.4c0-6.3 4.2-11.7 10-13.4 1.6-5.6 7.5-8.9 13.1-7.4 3.4-4 8.3-6.3 13.6-6.3 8.6 0 16 6.2 17.5 14.5 4.9 2.3 8 7.1 8 12.6zM62.3 68.8h-5.1V57.3H45.1v11.5H40L51.1 80l11.2-11.2z"/>
      </svg>
      <span class="label go-right">Download this episode</span>
    </a>
  <?php endif; ?>

  <!-- READ DOCUMENT -->
  <?php if ($page->document_link() != ""): ?>
    <a itemprop="citation" class="action read" href="<?php echo $page->document_link() ?>" title="Read <?php echo $page->provider() ?>'s document"  target="_blank">
      <svg viewBox="0 0 100 100">
      <path d="M65.3 57H44.2v-4.6h21l.1 4.6zm0-10H44.2v-4.6h21l.1 4.6zm0-10H44.2v-4.6h21l.1 4.6zM29.1 75.3V24.4h42.8v33.4c0 9.7-11.9 5.8-11.9 5.8s3.6 11.7-5.4 11.7H29.1zM78 58.4V18.3H23v63.1h31.7c10.4 0 23.3-13.6 23.3-23zM37.8 32c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7zm0 10.1c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7zm0 9.9c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7z"/>
      </svg>
      <span class="label go-right">Read <?php echo $page->provider() ?>'s document</span>
    </a>
  <?php endif ?>

  <!-- AUDIO CONTAINER -->
  <?php if ($page->episode_file()->isNotEmpty()) { ?>
    <div class="audio-holder" itemprop="audio">
      <audio preload="none" controls>
        <source src="/podcasts/<?php echo $page->episode_file() ?>" type="audio/mpeg" />
      </audio>
    </div>
  <?php } ?>
  
  <!-- Contribute To The F Plus -->
  <a class="social contribute" href="/contribute/" title="Contribute To The Podcast">
    <svg viewBox="0 0 100 100">
      <path d="M50.6 28.3l10.2-3.6L50 20.9l-10.7 3.7M32 36v-1.2l2.3-.7 9.5-3.4L32.7 27l-11.8 4.1v8.2L32 43.6M67.5 27l-9.7 3.6 8.9 2.9 3 1v7.6l9.4-4.1v-6.9M62.1 36.9L51 33.1l-11.4 4.2v9.2l10.4 4 12.1-5.2"/>
      <path d="M60.9 47.4L50 52.2l-9.2-3.6v24.9l9.2 5.6L60.9 72M33.2 45.6l-10.9-4.2v21L33.2 69M68.5 44v23.1l9.2-6V39.9" />
    </svg>
    <span class="label">Contribute to the Podcast</span>
  </a>

  <!-- TWEET THIS -->
  <a class="social twitter" href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode($page->title()); ?>%0A&url=<?php echo rawurlencode($page->url()); ?>&via=TheFPlus" target="_blank" title="Tweet this">
    <svg viewBox="0 0 100 100">
      <path d="M80.2 30.5c-2.3 1-4.8 1.8-7.4 2 2.6-1.6 4.7-4.1 5.7-7.1-2.5 1.5-5.2 2.6-8.2 3.2-2.3-2.5-5.7-4.1-9.5-4.1-7.1 0-13 5.8-13 13 0 1 .1 2 .3 2.9-10.8-.6-20.3-5.7-26.7-13.6-1.2 1.9-1.8 4.1-1.8 6.6 0 4.5 2.3 8.5 5.8 10.8-2 0-4.1-.7-5.8-1.6v.1c0 6.3 4.5 11.5 10.4 12.7-1.2.3-2.2.4-3.4.4-.9 0-1.6 0-2.5-.3 1.6 5.1 6.4 8.9 12.1 9-4.5 3.5-10.1 5.5-16 5.5-1 0-2 0-3.1-.1 5.7 3.7 12.6 5.8 20 5.8C61 75.7 74 55.9 74 38.8V37c2.3-1.6 4.5-4 6.2-6.5z"/>
    </svg>
    <span class="label">Tweet this episode</span>
  </a>
  
  <!-- FACEBOOK SHARE -->
  <a class="social facebook" href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" title="Share on Facebook">
    <svg viewBox="0 0 100 100">
      <path d="M76.8 18.3H21.9c-1.9 0-3.4 1.5-3.4 3.4v54.9c0 1.9 1.5 3.4 3.4 3.4h29.5V56.1h-8v-9.3h8V40c0-7.9 4.9-12.3 12-12.3 3.4 0 6.3.3 7.2.4v8.3h-4.9c-3.9 0-4.6 1.8-4.6 4.5v6h9.2L69 56.3h-7.9v23.9h15.7c1.9 0 3.4-1.5 3.4-3.4v-55c0-1.9-1.5-3.5-3.4-3.5z"/>
    </svg>
    <span class="label">Share on Facebook</span>
  </a>
  
  <?php if (strpos($page->tags(), 'reddit') !== false) { ?>
    <!-- REDDIT SHARE -->
    <a class="social reddit" href="https://reddit.com/submit/?<?php echo rawurlencode ($page->url()); ?>" target="_blank" title="Share on Reddit">
      <svg viewBox="0 0 100 100">
        <path d="M82.7 47.1c0-4.7-3.8-8.5-8.5-8.5-2.7 0-5.3 1.4-6.9 3.5-4.7-2.9-10.6-4.7-17.2-4.9.2-3.2 1.1-8.7 4.3-10.5 2-1.2 4.9-.7 8.6 1.4.4 4.3 4 7.6 8.4 7.6 4.7 0 8.5-3.8 8.5-8.5s-3.8-8.5-8.5-8.5c-3.9 0-7.2 2.7-8.2 6.3-4.1-2-7.5-2.3-10.2-.7-4.7 2.7-5.5 9.9-5.7 12.9-6.6.2-12.6 2-17.3 4.9-1.6-2.2-4.1-3.5-6.9-3.5-4.7 0-8.5 3.8-8.5 8.5 0 3.7 2.4 6.9 5.8 8.1-.1.6-.1 1.2-.1 1.9C20.3 68.1 33 77 48.7 77S77 68 77 57c0-.6-.1-1.3-.1-1.9 3.4-1.1 5.8-4.3 5.8-8zM21 52.4c-2.2-.8-3.7-2.9-3.7-5.3 0-3.1 2.5-5.7 5.7-5.7 1.8 0 3.5.9 4.5 2.3-3.1 2.4-5.4 5.4-6.5 8.7zm10.6.4c0-3.1 2.5-5.7 5.7-5.7 3.1 0 5.7 2.5 5.7 5.7s-2.5 5.7-5.7 5.7-5.7-2.6-5.7-5.7zm27.8 13.6c-3 1.7-6.8 2.7-10.8 2.7-3.9 0-7.8-1-10.8-2.7-.7-.4-.9-1.3-.5-1.9.4-.7 1.3-.9 1.9-.5 5.2 3 13.5 3 18.7 0 .7-.4 1.5-.2 1.9.5.5.7.2 1.5-.4 1.9zm.6-8c-3.1 0-5.7-2.5-5.7-5.7S56.8 47 60 47c3.1 0 5.7 2.5 5.7 5.7s-2.6 5.7-5.7 5.7zm16.2-6c-1.1-3.3-3.4-6.2-6.5-8.7 1.1-1.4 2.7-2.3 4.5-2.3 3.1 0 5.7 2.5 5.7 5.7 0 2.4-1.6 4.4-3.7 5.3z" />
      </svg>
      <span class="label">Share on Reddit</span>
    </a>
  <?php } else { ?>
    <!-- TUMBLR SHARE -->
    <a class="social tumblr" href="http://www.tumblr.com/share/link?url=<?php echo rawurlencode ($page->url()); ?>&amp;name=<?php echo rawurlencode ($page->title()); ?>&amp;description=<?php echo excerpt($page->text()->xml(), 180) ?>">
      <svg viewBox="0 0 100 100">
        <path d="M57.3 81.4c6.5 0 13-2.3 15.1-5.1l.4-.6-4-12c0-.1-.1-.2-.3-.2h-9c-.1 0-.2-.1-.3-.2-.1-.4-.2-.9-.2-1.5V47.2c0-.2.1-.3.3-.3H70c.2 0 .3-.1.3-.3v-15c0-.2-.1-.3-.3-.3H59.4c-.2 0-.3-.1-.3-.3V16.5c0-.2-.1-.3-.3-.3H40.2c-1.3 0-2.9 1-3.1 2.8-.9 7.5-4.4 12.1-10.9 14.2l-.7.2c-.1 0-.2.1-.2.3v12.9c0 .2.1.3.3.3H32.3v15.9c0 12.7 8.8 18.6 25 18.6zm12.4-6.1c-2 2-6.2 3.4-10.2 3.5h-.4c-13.2 0-16.7-10.1-16.7-16V44.6c0-.2-.1-.3-.3-.3h-6.4c-.2 0-.3-.1-.3-.3v-8.3c0-.1.1-.2.2-.3 6.8-2.6 10.6-7.9 11.6-16.1.1-.5.4-.5.4-.5h8.5c.2 0 .3.1.3.3v14.6c0 .2.1.3.3.3h10.6c.2 0 .3.1.3.3V44c0 .2-.1.3-.3.3H56.7c-.2 0-.3.1-.3.3v17.3c.1 3.9 2 5.9 5.6 5.9 1.5 0 3.2-.3 4.7-.9.1-.1.3 0 .4.2l2.7 8s0 .1-.1.2z" />
      </svg>
      <span class="label">Post to Tumblr</span>
    </a>
  <?php } ?>

  <!-- Save To Pocket -->
  <?php if ($page->episode_file()->isEmpty()) { ?>
    <a class="social pocket" href="https://getpocket.com/edit?url=<?=rawurlencode ($page->url()); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <path d="M67.1 47.8L53.2 61.2c-.8.8-1.8 1.1-2.8 1.1-1 0-2-.4-2.8-1.1l-14-13.4c-1.6-1.5-1.7-4.1-.1-5.7 1.6-1.6 4.1-1.7 5.7-.1l11.1 10.7L61.4 42c1.6-1.6 4.2-1.5 5.7.1 1.7 1.6 1.7 4.1 0 5.7zm12.5-18.6c-.7-2.1-2.8-3.5-5-3.5H26.1c-2.2 0-4.2 1.4-5 3.5-.2.6-.3 1.3-.3 1.9V49l.2 3.6c.9 8.1 5 15.1 11.5 20.1.1.1.2.2.4.3l.1.1c3.5 2.5 7.4 4.3 11.6 5.1 1.9.4 3.9.6 5.9.6 1.8 0 3.7-.2 5.4-.5.2-.1.4-.1.7-.1.1 0 .1 0 .2-.1 4-.9 7.8-2.6 11.1-5l.1-.1.3-.3c6.5-4.9 10.7-12 11.5-20.1L80 49V31c-.1-.6-.2-1.2-.4-1.8z" />
      </svg>
      <span class="label">Save to Pocket</span>
    </a>
  <?php } ?>

  <!-- GitHub Repo -->
  <?php if ($page->github_repo()->isNotEmpty()) { ?>
    <a class="social github" href="<?= $page->github_repo(); ?>" title="Fork on GitHub">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <path d="M50 15.3c-19 0-34.3 15.4-34.3 34.3 0 15.2 9.8 28 23.5 32.6 1.7.3 2.3-.7 2.3-1.7v-5.8c-9.5 2.1-11.6-4.6-11.6-4.6-1.6-4-3.8-5-3.8-5-3.1-2.1.2-2.1.2-2.1 3.4.2 5.3 3.5 5.3 3.5 3.1 5.2 8 3.7 10 2.9.3-2.2 1.2-3.7 2.2-4.6-7.6-.9-15.6-3.8-15.6-17 0-3.7 1.3-6.8 3.5-9.2-.4-.9-1.5-4.4.3-9.1 0 0 2.9-.9 9.4 3.5 2.7-.8 5.7-1.1 8.6-1.2 2.9 0 5.9.4 8.6 1.2 6.6-4.4 9.4-3.5 9.4-3.5 1.9 4.7.7 8.2.3 9.1 2.2 2.4 3.5 5.5 3.5 9.2 0 13.2-8 16.1-15.7 16.9 1.2 1.1 2.3 3.2 2.3 6.4v9.4c0 .9.6 2 2.4 1.7 13.6-4.5 23.5-17.4 23.5-32.6C84.3 30.7 69 15.3 50 15.3z"/>
      </svg>
      <span class="label">Fork on GitHub</span>
    </a>
  <?php } ?>
      
</div>