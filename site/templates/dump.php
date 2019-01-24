<?php snippet('header') ?>

  <main class="main page" role="main">

    <article class="full">
      <h1><?php echo $page->title() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </article>

    <article class="full">
      <div class="hopper-wrapper">
        <ul class="submitted-content dump">
          <li class="thead">
            <span class="th"></span>
            <span class="th">Document</span>
            <span class="th">submitted by</span>
            <span class="th">dumped on</span>
          </li>
          <?php foreach($page->builder()->toStructure()->flip() as $section): ?>
            <?php if (strpos($section->submitter(),',') !== false) {
              $multisubmit = true;
              $docsubmitters = explode(",", $section->submitter()); 
            } else if ($section->submitter() != '') {
              $multisubmit = false;
            } ?>
            <li>
              <span class="number-cell"></span>
              <a class="submission" href="<?php echo $section->docurl(); ?>" target="_blank">
                <?php echo $section->title(); ?>
              </a>
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
              <?php if ($section->rejectdate() != "") { ?>
                <time class="rejected-date">
                  <?php $docdate = strtotime($section->rejectdate()); ?>
                  <?php echo date('F jS, Y', $docdate); ?>
                </time>
              <?php } else { ?>
                <span class="submitted-date blank"></span>
              <?php } ?>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    </article>
    
  </main>

<?php snippet('footer') ?>