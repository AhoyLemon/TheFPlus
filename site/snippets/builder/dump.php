<table class="document-table rejected">
  <tbody>
    <tr>
      <td class="title">
        <a href="<?= $data->docurl(); ?>">
          <?= $data->title(); ?>
        </a>
      </td>
      <td class="submitter">
        <?= $data->submitter(); ?>
      </td>
      <td class="date">
        <time class="rejected-date">
          <?php $docdate = strtotime($data->rejectdate()); ?>
          <?php echo date('F jS, Y', $docdate); ?>
        </time>
      </td>
    </tr>
  </tbody>
</table>