<?php snippet('header') ?>

  <main class="main page" role="main">
    
    <article class="person full <?php echo $page->role() ?>" itemscope itemtype="http://schema.org/Person">
    
      <figure>
        <?php if($page->cover() != "") { ?>
          <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="headshot cover <?= $page->cover()->toFile()->extension(); ?>" alt="Allegedly, a photo of <?php echo $page->title() ?>">
        <?php } else if($image = $page->image()) { ?>
          <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="headshot cover" alt="Allegedly, a photo of <?php echo $page->title() ?>">
        <?php } ?>
      </figure>


      <header>
      
      <!-- Specific syntax for Tommy -->
      <?php if ($page->slug() == "tommy") {
        echo '<h3 style="font-size:1.5rem;">In loving memory of</h3>';
      } ?>

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
            <a rel="me" itemprop="sameAs" href="<?php echo $page->website() ?>" target="_blank">Website</a>
          </li>
        <?php endif ?>
        
        <!-- TWITTER --->
        <?php if ($page->twitter() != ""): ?>
          <li>
            <svg class="label twitter" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
            <a rel="me" itemprop="sameAs" href="https://twitter.com/<?php echo $page->twitter() ?>" target="_blank">
              Twitter
            </a>
          </li>
        <?php endif ?>


        <!-- MASTODON --->
        <?php if ($page->mastodon()->isNotEmpty()): ?>
          <li>
            <svg class="label mastodon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Mastodon</title><path d="M23.268 5.313c-.35-2.578-2.617-4.61-5.304-5.004C17.51.242 15.792 0 11.813 0h-.03c-3.98 0-4.835.242-5.288.309C3.882.692 1.496 2.518.917 5.127.64 6.412.61 7.837.661 9.143c.074 1.874.088 3.745.26 5.611.118 1.24.325 2.47.62 3.68.55 2.237 2.777 4.098 4.96 4.857 2.336.792 4.849.923 7.256.38.265-.061.527-.132.786-.213.585-.184 1.27-.39 1.774-.753a.057.057 0 0 0 .023-.043v-1.809a.052.052 0 0 0-.02-.041.053.053 0 0 0-.046-.01 20.282 20.282 0 0 1-4.709.545c-2.73 0-3.463-1.284-3.674-1.818a5.593 5.593 0 0 1-.319-1.433.053.053 0 0 1 .066-.054c1.517.363 3.072.546 4.632.546.376 0 .75 0 1.125-.01 1.57-.044 3.224-.124 4.768-.422.038-.008.077-.015.11-.024 2.435-.464 4.753-1.92 4.989-5.604.008-.145.03-1.52.03-1.67.002-.512.167-3.63-.024-5.545zm-3.748 9.195h-2.561V8.29c0-1.309-.55-1.976-1.67-1.976-1.23 0-1.846.79-1.846 2.35v3.403h-2.546V8.663c0-1.56-.617-2.35-1.848-2.35-1.112 0-1.668.668-1.67 1.977v6.218H4.822V8.102c0-1.31.337-2.35 1.011-3.12.696-.77 1.608-1.164 2.74-1.164 1.311 0 2.302.5 2.962 1.498l.638 1.06.638-1.06c.66-.999 1.65-1.498 2.96-1.498 1.13 0 2.043.395 2.74 1.164.675.77 1.012 1.81 1.012 3.12z"/></svg>
            <a rel="me" itemprop="sameAs" href="<?php echo $page->mastodon(); ?>" target="_blank">
              Mastodon
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
            <a itemprop="email" itemprop="email" content="<?php echo $page->email() ?>" href="mailto:<?php echo $page->email() ?>" target="_blank">Email</a>
          </li>
        <?php endif ?>
        
        <!-- BALLPIT ACCOUNT -->
        <?php if ($page->ballpit_account() != ""): ?>
          <li>
            <svg class="label ballpit" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><title>Ballpit</title><path d="M16.6 14.8c.7.2 3.2-6.2 10.2-6.5 3.5-.1 6.1 2.8 6.4 2.3.3-.5-1.3-2.9-6.8-3.1-6.3 0-10.5 7.1-9.8 7.3Z" style="fill-rule:nonzero" transform="matrix(.51555 0 0 .51555 -2.195 -2.403)"/><path d="M16.6 12.5s3.1-7.1 9.9-7.6c4.3-.1 5.4 2.5 5.4 2.5s-.9-1.3-5.5-1.5c-6.5.4-9.8 6.6-9.8 6.6Z" style="fill-rule:nonzero" transform="matrix(.51555 0 0 .51555 -2.195 -2.403)"/><ellipse cx="31.5" cy="20.3" rx=".9" ry="1.5" transform="matrix(.51555 0 0 .51555 -2.195 -2.403)"/><ellipse cx="26.8" cy="20" rx=".7" ry="1.2" transform="matrix(.51555 0 0 .51555 -2.195 -2.403)"/><path d="M40.1 35.9c-6 .1-12.2 4.8-14.4 6.7-1.5-1.4-2.4-3.2-1.8-5.6 0-1.3 3.3-5.6 6.7-6.9.9 1.1 2.4 2.7 3 2.5.6-.2 1.6-2.4 2.1-3.8 1.2-.2 2.5-.3 3.6-.4.6 1.2 1.8 3.5 2.5 3.4.7-.1 2.4-2.4 3.2-3.5h1.1c-.1-.4-.3-.8-.5-1.3-1-2.2-2.2-4.3-3.8-6.1-1.1-1.2-2.3-2.2-3.7-3.1-1.3-.9-3-1.5-4.2-2.5-.5-.5-1.1-1.3-1.8-1.6-.7-.3-1.7-.2-2.2.2-.4.3-.4.5-.8.2-.8-.4-1.2-1.3-1.9-1.8-1.7-1.3-4.1-.8-5.5.7-.7.8-1.1 1.8-1.8 2.6-.8 1-2.1 1.3-3.1 2.2-1.8 1.7-3.4 3.5-4.6 5.7-1 2-1.6 4.2-1.8 6.4-.7 6.3.9 12.5 11.6 18.8 9.6 4.3 19.1-1.3 19.1-1.3S32.6 47 27.5 44c.9-.7 2.4-1.9 5.2-3 4.8-1.9 9.5.5 10.1 1.9.6 1.4.6 4.5.6 4.5s1.6-1.7 1.4-3.6c-.2-1.9-.9-3.8-.9-3.8s1.3.3 2.7 1.7c1.3 1.4 1.7 4.2 1.7 4.2s1.2-2.2 1.1-4.1c.1-1.9-1.9-6-9.3-5.9Zm-17.4-7.2c-2.8-.5-4.4-4.5-3.5-8.9.9-4.4 3.8-7.5 6.6-6.9 1.5.3 2.7 1.6 3.3 3.5.3-1 1-1.8 1.8-2 1.8-.4 3.8 1.6 4.6 4.7.8 3-.1 5.8-1.8 6.3-1.6.4-3.4-1.2-4.3-3.7v.2c-1 4.3-3.9 7.4-6.7 6.8Z" style="fill-rule:nonzero" transform="matrix(.51555 0 0 .51555 -2.195 -2.403)"/></svg>
            <a rel="me" itemprop="sameAs" href="<?php echo $page->ballpit_account() ?>">Ballp.it</a>
          </li>
        <?php endif ?>
      </ul>
    </header>
    
    
      <?php /*
      <?php if($image = $page->image()): ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="headshot" alt="Allegedly, a photo of <?php echo $page->title() ?>">
      <?php endif ?>
      */ ?>
      
      <!-- PERSON'S BIO -->
      <?php if ($page->text() != ""): ?>
        <summary class="info-block article-text" itemprop="description">
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
      <?php $articles = $site->find('also-made', 'guess', 'merch')->children()->visible()->filterBy('cast', $findme, ',')->sortBy('date', 'desc') ?>
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


      <?php if ($site->find('fanart')->images()->filterBy('artist', $page->title())->count() > 0) { ?>
        <div class="info-block fanart-block">
          <div class="list-leader">Fanart Made:
          <div class="fanart-grid">
            <?php snippet('fanart-thumbnails',  [ 'fanartArray' => $site->find('fanart')->images()->filterBy('artist', $page->title()) ]) ?>
          </div>
        </div>

      <?php } ?>
      
      
    </article>

  </main>

<?php snippet('footer') ?>