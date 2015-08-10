<?php snippet('header') ?>

  <main class="main page" role="main">

    <article class="full default">
      <h1><?php echo $page->title() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </article>

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
              <?php $meetslug = strtolower(preg_replace('/\s+/', '-', $section->submitter())); ?>
              <?php if($site->find('meet/'.$meetslug)){ ?>
                <a href="/meet/<?php echo $meetslug; ?>"><?php echo $section->submitter() ?></a>
              <?php } else { ?>
                <?php echo $section->submitter() ?>
              <?php } ?>
            <?php } else if ($multisubmit == true) { ?>
              <span class="comma-this">
                <?php foreach($docsubmitters as $docsubmitter): ?>
                  <?php $meetslug = strtolower(preg_replace('/\s+/', '-', $docsubmitter)); ?>
                  <?php if($site->find('meet/'.$meetslug)){ ?>
                    <span class="add-comma">
                      <a href="/meet/<?php echo $meetslug; ?>"><?php echo $docsubmitter ?></a>
                    </span>
                  <?php } else { ?>
                    <span class="add-comma">
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
    
  </main>

<?php snippet('footer') ?>