<table class="document-table <?php if ($data->recorded() == "1") { echo 'recorded'; } ?>">
  <tbody>
    <tr>
      <td class="title">
        <a href="<?= $data->docurl(); ?>">
          <?= $data->title(); ?>
          <?php if ($data->recorded() == "1") { ?>
            <b> | RECORDED</b>
          <?php } ?>
        </a>
      </td>
      <td class="submitter">
        <?= $data->submitter(); ?>
      </td>
      <td class="date">
        <time class="submitted-date">
          <?php $docdate = strtotime($data->subdate()); ?>
          <?php echo date('F jS, Y', $docdate); ?>
        </time>
      </td>
    </tr>
  </tbody>
</table>