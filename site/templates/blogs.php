<?php snippet('header') ?>
  <main class="main" role="main">
		
		<?php $articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(28) ?>
		
    <section class="<?php echo $page->slug(); ?> blogs">
      <?php foreach($articles as $article): ?>
				
				<article class="wrote brief">
					<aside>
						<?php if($image = $article->image()): ?>
              <a class="image-holder" href="<?php echo $article->url() ?>" alt="<?php echo $article->title(); ?>">
                <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" />
              </a>
            <?php endif ?>
					</aside>
					<summary>
						<h2 class="title">
							<a href="<?php echo $article->url() ?>" title="<?php echo $article->title(); ?>">
								<span><?php echo html($article->title()) ?></span>
							</a>
						</h2>
						<?php if ($article->author() != ""): ?>
							<div class="author-block">
								by: 
								<span class="author"><?php echo $article->author() ?></span>
							</div>
						<?php endif ?>
						<time class="published released">
							<span class="date">
								<?php echo date('l, F jS Y', $article->date()) ?>
							</span>
							@
							<span class="time">
								<?php echo date("g:ia", strtotime($article->time())) ?>
							</span>
						</time>
						<div class="content">
							<p><?php echo excerpt($article->text(), 222) ?></p>
						</div>
						<?php if ($article->tags() != ""):
              $etags = explode(",", $article->tags());
            ?>
							<ul class="blog-tags">
								<?php foreach($etags as $etag): ?>
									<?php $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ','); ?>
									<?php $x = 0; ?>
									<?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
									<?php endforeach ?>
									<a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo trim($etag) ?>" <?php endif ?>><?php echo trim($etag) ?></a>
								<?php endforeach ?>
							</ul>
						<?php endif ?>
						<a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
					</summary>
				</article>
			
      <?php endforeach ?>
    </section>
    
    <?php if($articles->pagination()->hasPages()): ?>
      <nav class="pagination">
        <?php if($articles->pagination()->hasNextPage()): ?>
          <a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">older posts</a>
        <?php endif ?>
        <?php if($articles->pagination()->hasPrevPage()): ?>
          <a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">newer posts</a>
        <?php endif ?>
        
        <?php $randumb = $page->children()->visible()->shuffle()->first(); ?>    
        <a class="randumb" href="<?php echo $randumb->url(); ?>">random</a>
      </nav>
    <?php endif ?>

  </main>
<?php snippet('disqus-alt', array('allow_comments' => false)) ?>
<?php snippet('footer') ?>