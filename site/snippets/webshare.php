<button id="ShareThisPage" class="button share-this-page" style="display:none;">

  <svg class="button-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
    <path d="M72 5.038c-8.2 0-15 6.8-15 15 0 1.5.2 2.9.6 4.2l-20.3 14.1c-2.6-2-5.8-3.3-9.3-3.3-8.2 0-15 6.8-15 15s6.8 15 15 15c3.5 0 6.7-1.2 9.3-3.3l20.3 14.1c-.4 1.3-.6 2.8-.6 4.2 0 8.2 6.8 15 15 15s15-6.8 15-15-6.8-15-15-15c-4.6 0-8.8 2.1-11.6 5.5l-19.2-13.4c1.1-2.1 1.8-4.5 1.8-7.1 0-2.6-.7-5-1.8-7.1 7-4.5 12.2-8.9 19.3-13.4 2.8 3.3 6.9 5.5 11.6 5.5 8.2 0 15-6.8 15-15s-6.9-15-15.1-15zm0 6c5 0 9 4 9 9s-4 9-9 9-9-4-9-9 4-9 9-9zm-44 30c5 0 9 4 9 9s-4 9-9 9-9-4-9-9 4-9 9-9zm44 30c5 0 9 4 9 9s-4 9-9 9-9-4-9-9 4-9 9-9z"/>
  </svg>

  <span class="button-text">
    <?php if ($page->parent()->slug() == "episode") { echo 'Share This Episode'; }
          else                                      { echo 'Share This'; }
    ?>
  </span>

</button>

<script>

  if (navigator.share) {
    $('#ShareThisPage').css('display','block');
  }

  $('#ShareThisPage').click(function() {
    if (navigator.share) {
      navigator.share({
        title: '<?= $page->title(); ?>',
        url: '<?= $page->url(); ?>',          
        text: 'The F Plus, Episode <?= $page->slug(); ?>',
      }).then(() => {
        alert.log('Thanks for sharing!');
      })
      .catch(console.error);
    } else {
      // fallback
    }
  })
</script>