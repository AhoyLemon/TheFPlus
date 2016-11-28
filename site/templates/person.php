<?php snippet('header') ?>

  <main class="main page" role="main">
    
    <article class="person full <?php echo $page->role() ?>" itemscope itemtype="http://schema.org/Person">
      <meta itemprop="url" content="<?php echo $page->url() ?>" />
      <header>
      <!-- NAME -->
      <h1>
        <span class="name" itemprop="name"><?php echo $page->title() ?></span>
        <?php if ($page->job() != ""): ?>
          <span class="job" itemprop="jobTitle"><?php echo $page->job() ?></h2>
        <?php endif ?>
      </h1>
      <ul class="personal-links">
        <!-- WEBSITE --->
        <?php if ($page->website() != ""): 
          $website_readout = preg_replace('#^https?://#', '', $page->website());
        ?>
          <li>
            <svg class="label website" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
              <polygon points="28.2,10 6.4,28.2 10.1,28.2 10.1,50 24.6,50 24.6,39.1 31.8,39.1 31.8,50 46.4,50 46.4,28.2 50,28.2 	"/>
              <polygon points="45.2,10 37.9,10 37.9,14.9 45.2,20.9 	"/>
            </svg>
            <a itemprop="sameAs" href="<?php echo $page->website() ?>" target="_blank"><?php echo $website_readout ?></a>
          </li>
        <?php endif ?>
        
        <!-- TWITTER --->
        <?php if ($page->twitter() != ""): ?>
          <li>
            <svg class="label twitter" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
              <path d="M50,19c-1.6,0.7-3.3,1.2-5.1,1.4c1.8-1.1,3.2-2.8,3.9-4.9c-1.7,1-3.6,1.8-5.6,2.2c-1.6-1.7-3.9-2.8-6.5-2.8c-4.9,0-8.9,4-8.9,8.9c0,0.7,0.1,1.4,0.2,2c-7.4-0.4-13.9-3.9-18.3-9.3c-0.8,1.3-1.2,2.8-1.2,4.5c0,3.1,1.6,5.8,4,7.4c-1.4,0-2.8-0.5-4-1.1c0,0,0,0.1,0,0.1c0,4.3,3.1,7.9,7.1,8.7c-0.8,0.2-1.5,0.3-2.3,0.3c-0.6,0-1.1,0-1.7-0.2c1.1,3.5,4.4,6.1,8.3,6.2c-3.1,2.4-6.9,3.8-11,3.8c-0.7,0-1.4,0-2.1-0.1c3.9,2.5,8.6,4,13.7,4c16.4,0,25.3-13.6,25.3-25.3c0-0.4,0-0.8,0-1.2C47.3,22.3,48.8,20.7,50,19z"/>
            </svg>
            <a itemprop="sameAs" href="https://twitter.com/<?php echo $page->twitter() ?>" target="_blank">
              @<?php echo $page->twitter() ?>
            </a>
          </li>
        <?php endif ?>
        
        <!-- EMAIL -->
        <?php if ($page->email() != ""): ?>
          <li>
            <svg class="label email" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
              <path d="M38.8,33.2l-10.3,7.9l-10.3-7.8L6.7,44.7l0,3.5c0,1,0.9,1.8,1.9,1.8l39.7-0.1c1.1,0,1.9-0.8,1.9-1.8l0-3.5L38.8,33.2z"/>
              <polygon points="15.8,31.4 6.7,24.5 6.7,40.4 "/>
              <polygon points="41.2,31.4 50.3,40.4 50.3,24.4 "/>
              <path d="M48.3,18.5L8.6,18.6c-1.1,0-1.9,0.8-1.9,1.8v0.8l21.8,16.6l21.8-16.7v-0.8C50.3,19.4,49.4,18.5,48.3,18.5zM35,26.8c-0.2,0.6-0.5,1.1-0.9,1.5c-0.4,0.4-0.8,0.8-1.3,1.1c-0.5,0.3-1.1,0.4-1.7,0.4c-0.7,0-1.3-0.2-1.7-0.5c-0.3,0.1-0.6,0.3-0.9,0.4c-0.3,0.1-0.7,0.2-1.2,0.2c-0.3,0-0.6,0-0.9-0.1c-0.3-0.1-0.5-0.2-0.7-0.4c-0.2-0.2-0.4-0.4-0.5-0.7c-0.1-0.3-0.2-0.6-0.2-1c0-0.6,0.1-1.2,0.3-1.7c0.2-0.5,0.5-1,0.9-1.4c0.4-0.4,0.8-0.7,1.3-0.9c0.5-0.2,1.1-0.3,1.7-0.3c0.4,0,0.9,0,1.3,0.1c0.4,0.1,0.8,0.2,1.2,0.3l-1,4.7c0.1,0.1,0.3,0.1,0.5,0.1c0.4,0,0.7-0.1,1-0.3c0.3-0.2,0.5-0.5,0.7-0.8c0.2-0.3,0.3-0.7,0.4-1.1c0.1-0.4,0.1-0.8,0.1-1.2c0-1.1-0.4-1.9-1-2.5c-0.7-0.6-1.7-0.8-2.9-0.8c-1,0-1.8,0.2-2.6,0.5c-0.8,0.3-1.4,0.7-1.9,1.3c-0.5,0.5-0.9,1.1-1.2,1.8c-0.3,0.7-0.4,1.4-0.4,2.1c0,0.7,0.1,1.2,0.3,1.7c0.2,0.5,0.5,0.9,0.9,1.2c0.4,0.3,0.8,0.5,1.3,0.7c0.5,0.1,1,0.2,1.6,0.2c0.5,0,1,0,1.4-0.1c0.4-0.1,0.8-0.2,1.2-0.3c0.1,0.2,0.2,0.4,0.3,0.6c0.1,0.2,0.2,0.4,0.2,0.7c-0.2,0.1-0.4,0.2-0.6,0.2c-0.3,0.1-0.5,0.1-0.8,0.2c-0.3,0-0.6,0.1-0.9,0.1c-0.3,0-0.6,0-1,0c-0.8,0-1.5-0.1-2.2-0.3c-0.7-0.2-1.3-0.5-1.8-0.9c-0.5-0.4-0.9-1-1.2-1.6c-0.3-0.6-0.5-1.4-0.5-2.3c0-0.8,0.2-1.7,0.5-2.5c0.3-0.9,0.8-1.6,1.5-2.3c0.7-0.7,1.5-1.2,2.5-1.7c1-0.4,2.3-0.7,3.7-0.7c0.8,0,1.5,0.1,2.1,0.3c0.7,0.2,1.3,0.5,1.8,0.9c0.5,0.4,0.9,0.9,1.2,1.5c0.3,0.6,0.4,1.3,0.4,2.1C35.3,25.7,35.2,26.2,35,26.8z"/>
              <path d="M29,24.7c-0.3,0-0.6,0.1-0.9,0.2c-0.3,0.1-0.5,0.3-0.7,0.6c-0.2,0.2-0.3,0.5-0.4,0.8c-0.1,0.3-0.1,0.6-0.1,1c0,0.4,0.1,0.7,0.3,0.9c0.2,0.2,0.5,0.3,0.8,0.3c0.2,0,0.4,0,0.5,0c0.1,0,0.3-0.1,0.5-0.1l0.6-3.5c-0.1,0-0.2,0-0.3-0.1C29.2,24.7,29.1,24.7,29,24.7z"/>
            </svg>
            <a itemprop="email" itemprop="email" content="<?php echo $page->email() ?>" href="mailto:<?php echo $page->email() ?>" target="_blank"><?php echo $page->email() ?></a>
          </li>
        <?php endif ?>
        
        <!-- BALLPIT ACCOUNT -->
        <?php if ($page->ballpit_account() != ""): ?>
          <li>
            <svg class="label ballpit" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
              <path d="M16.6,14.8c0.7,0.2,3.2-6.2,10.2-6.5c3.5-0.1,6.1,2.8,6.4,2.3c0.3-0.5-1.3-2.9-6.8-3.1C20.1,7.5,15.9,14.6,16.6,14.8z"/>
              <path d="M16.6,12.5c0,0,3.1-7.1,9.9-7.6c4.3-0.1,5.4,2.5,5.4,2.5S31,6.1,26.4,5.9C19.9,6.3,16.6,12.5,16.6,12.5z"/>
              <ellipse cx="31.5" cy="20.3" rx="0.9" ry="1.5"/>
              <ellipse cx="26.8" cy="20" rx="0.7" ry="1.2"/>
              <path d="M40.1,35.9c-6,0.1-12.2,4.8-14.4,6.7c-1.5-1.4-2.4-3.2-1.8-5.6c0-1.3,3.3-5.6,6.7-6.9c0.9,1.1,2.4,2.7,3,2.5c0.6-0.2,1.6-2.4,2.1-3.8c1.2-0.2,2.5-0.3,3.6-0.4c0.6,1.2,1.8,3.5,2.5,3.4c0.7-0.1,2.4-2.4,3.2-3.5c0.7,0,1.1,0,1.1,0c-0.1-0.4-0.3-0.8-0.5-1.3c-1-2.2-2.2-4.3-3.8-6.1c-1.1-1.2-2.3-2.2-3.7-3.1c-1.3-0.9-3-1.5-4.2-2.5c-0.5-0.5-1.1-1.3-1.8-1.6c-0.7-0.3-1.7-0.2-2.2,0.2c-0.4,0.3-0.4,0.5-0.8,0.2c-0.8-0.4-1.2-1.3-1.9-1.8c-1.7-1.3-4.1-0.8-5.5,0.7c-0.7,0.8-1.1,1.8-1.8,2.6c-0.8,1-2.1,1.3-3.1,2.2c-1.8,1.7-3.4,3.5-4.6,5.7c-1,2-1.6,4.2-1.8,6.4c-0.7,6.3,0.9,12.5,11.6,18.8c9.6,4.3,19.1-1.3,19.1-1.3s-8.5-0.4-13.6-3.4c0.9-0.7,2.4-1.9,5.2-3c4.8-1.9,9.5,0.5,10.1,1.9c0.6,1.4,0.6,4.5,0.6,4.5s1.6-1.7,1.4-3.6c-0.2-1.9-0.9-3.8-0.9-3.8s1.3,0.3,2.7,1.7c1.3,1.4,1.7,4.2,1.7,4.2s1.2-2.2,1.1-4.1C49.5,39.9,47.5,35.8,40.1,35.9z M22.7,28.7c-2.8-0.5-4.4-4.5-3.5-8.9c0.9-4.4,3.8-7.5,6.6-6.9c1.5,0.3,2.7,1.6,3.3,3.5c0.3-1,1-1.8,1.8-2c1.8-0.4,3.8,1.6,4.6,4.7c0.8,3-0.1,5.8-1.8,6.3c-1.6,0.4-3.4-1.2-4.3-3.7c0,0.1,0,0.1,0,0.2C28.4,26.2,25.5,29.3,22.7,28.7z"/>
            </svg>
            <a itemprop="sameAs" href="<?php echo $page->ballpit_account() ?>">ballp.it profile</a>
          </li>
        <?php endif ?>
      </ul>
    </header>
      <!-- PHOTO -->
      
      <?php if($page->cover() != "") { ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="headshot" alt="Allegedly, a photo of <?php echo $page->title() ?>">
      <?php } else if($image = $page->image()) { ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="headshot" alt="Allegedly, a photo of <?php echo $page->title() ?>">
      <?php } ?>
      
      
      <?php /*
      <?php if($image = $page->image()): ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="headshot" alt="Allegedly, a photo of <?php echo $page->title() ?>">
      <?php endif ?>
      */ ?>
      
      <!-- PERSON'S BIO -->
      <?php if ($page->text() != ""): ?>
        <summary class="info-block" itemprop="description">
          <?php echo $page->text()->kirbytext() ?>
        </summary>
      <?php endif ?>
      
      <!-- FAVORITE EPISODE(S) -->
      <?php if ($page->favorite_episode() != ""): 
        $favorites = explode(",", $page->favorite_episode()); 
      ?>
        <div class="info-block">
          <span class="list-leader">Favorite Episodes:</span>
          <ol>
          <?php foreach($favorites as $favorite): ?>
            <li><a href="<?php echo url::home() ?>/episode/<?php echo trim($favorite); ?>"><?php echo $site->children()->children()->findByURI($favorite)->title() ?></a></li>
          <?php endforeach ?>
          </ol>
        </div>
      <?php endif ?>
      
      <!--- APPEARS IN EPISODES -->
      <?php
        $findme = $page->title();
      ?>
      <?php $articles = $site->find('episode')->children()->visible()->filterBy('cast', $findme, ',')->sortBy('date', 'desc') ?>
      <?php if ($articles->count() > 0): ?>
        <div class="info-block appears-in">
          <span class="list-leader"><?php echo $findme; ?> appears in:</span>
          <ul>
            <?php foreach($articles as $article): ?>
              <li>
                <a href="<?php echo $article->url() ?>">
                  <span><?php echo $article->title() ?></span>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>
      
      <!-- CONTRIBUTED TO PROJECTS -->
      <?php $articles = $site->find('also-made', 'guess')->children()->visible()->filterBy('cast', $findme, ',')->sortBy('date', 'desc') ?>
      <?php if ($articles->count() > 0): ?>
        <div class="info-block appears-in">
          <span class="list-leader"><?php echo $findme; ?> Contributed To:</span>
          <ul>
            <?php foreach($articles as $article): ?>
              <li>
                <a href="<?php echo $article->url() ?>">
                  <span><?php echo $article->title() ?></span>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>
      
      <!-- BLOG CREDITS -->
      <?php $articles = $site->find('wrote')->children()->visible()->filterBy('author', $findme, ',')->sortBy('date', 'desc') ?>
      <?php if ($articles->count() > 0): ?>
        <div class="info-block appears-in">
          <span class="list-leader"><?php echo $findme; ?> Wrote:</span>
          <ul>
            <?php foreach($articles as $article): ?>
              <li>
                <a href="<?php echo $article->url() ?>">
                  <span><?php echo $article->title() ?></span>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>
      
      
      <?php $provs = $site->grandChildren()->visible()->filterBy('provider', $findme, ',')->sortBy('date', 'desc') ?>
      <?php if ($provs->count() > 0): ?>
        <div class="info-block documents-provided">
          <span class="list-leader">Documents Provided:</span>
          <ul>
            <?php foreach($provs as $prov): ?>
              <li><a href="<?php echo $prov->url() ?>"><?php echo $prov->title() ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>
      
      
    </article>

  </main>

<?php snippet('footer') ?>