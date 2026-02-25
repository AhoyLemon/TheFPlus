<?php snippet('header') ?>

  <?php 
    $showWhat = trim(strip_tags(kirby()->request()->get('show') ?? ''));
    if ($showWhat == "links") {
      $description = "A list of links submitted by listeners.";
      $showLinks = true;
    } else {
      $description = "A list of documents submitted by listeners.";
      $showLinks = false;
    }
  ?>

  <main class="main page" role="main">

    <article class="full">
      <h1><?php echo $page->title() ?></h1>
      <h2><?= $description; ?></h2>
      <div class="article-text">
        <?php echo $page->text()->kirbytext() ?>
      </div>
    </article>

    <article class="full">
      <div class="hopper-wrapper">
        <ul class="submitted-content hopper">
          <li class="thead">
            <span class="th"></span>
            <span class="th">Document</span>
            <span class="th">submitted by</span>
            <span class="th">submitted on</span>
          </li>
          <?php foreach($page->docs()->toStructure()->sortBy('subdate', 'desc') as $section): ?>
            <?php if (strpos($section->submitter(),',') !== false) {
              $multisubmit = true;
              $docsubmitters = explode(",", $section->submitter()); 
            } else if ($section->submitter() != '') {
              $multisubmit = false;
            } ?>
            <li>
              <span class="number-cell"></span>
              <span class="submission">
                <?php if ($showLinks) { ?>
                  <a href="<?php echo $section->docurl(); ?>" target="_blank">
                    <?php echo $section->title(); ?>
                  </a>
                <?php } else { ?>
                  <span>
                    <?php echo $section->title(); ?>
                  </span>
                <?php } ?>
                <?php if ($section->recorded()->bool()) { ?>
                  <span class="recorded">
                    | <b>RECORDED</b>
                  </span>
                <?php } ?>
                
                <?php if ($showLinks && ($section->dibs()->isNotEmpty())) { ?>
                  <?php $dibs = explode(',', $section->dibs()); ?>
                  <span class="dibs dibs-icon">
                    <?= count($dibs); ?>
                  </span>
                  <div class="dibs dibs-list">
                    <strong>Dibs:</strong>
                    <?= $section->dibs(); ?>
                  </div>
                <?php } ?>

              </span>
              <?php if ($section->submitter()->isNotEmpty()) {?>
                <span class="submitter">
                  <?php if ($multisubmit == false) { ?>
                    <?php $meetslug = strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $section->submitter()))); ?>
                    <?php if($site->find('meet/'.$meetslug)){ ?>
                      <a href="/meet/<?php echo $meetslug; ?>"><?php echo $section->submitter() ?></a>
                    <?php } else { ?>
                      <?php echo $section->submitter() ?>
                    <?php } ?>
                  <?php } else if ($multisubmit == true) { ?>
                    <span class="multiple-items">
                      <?php foreach($docsubmitters as $docsubmitter): ?>
                        <?php $meetslug = strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $docsubmitter))); ?>
                        <?php if($site->find('meet/'.$meetslug)){ ?>
                          <span class="item">
                            <a href="/meet/<?php echo $meetslug; ?>"><?php echo $docsubmitter ?></a>
                          </span>
                        <?php } else { ?>
                          <span class="item">
                            <?php echo $docsubmitter ?>
                          </span>
                        <?php } ?>
                      <?php endforeach ?>
                    </span>
                  <?php } ?>
                </span>
              <?php } ?>
              <?php
                $subdateRaw = $section->subdate()->value();
                if ($subdateRaw) {
                  if (is_numeric($subdateRaw)) {
                    // Assume Unix timestamp
                    echo '<time class="submitted-date">' . date('M j, Y', (int)$subdateRaw) . '</time>';
                  } elseif (strtotime($subdateRaw)) {
                    // Assume date string
                    echo '<time class="submitted-date">' . date('M j, Y', strtotime($subdateRaw)) . '</time>';
                  } else {
                    echo '<span class="submitted-date blank"></span>';
                  }
                } else {
                  echo '<span class="submitted-date blank"></span>';
                }
              ?>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    </article>
    
  </main>

<?php snippet('footer') ?>