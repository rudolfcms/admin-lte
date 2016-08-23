<?php include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
<div class="box">
  <?php if ($this->loop->isPagination()): ?> 
  <div class="box-header" style="height: 50px;">
    <div class="box-tools">
      <?=$this->loop->nav(['ul' => 'pagination pagination no-margin pull-right', 'current' => 'active'], 2);?>
    </div>
  </div>
  <?php endif;?> 
  <div class="box-body table-responsive no-padding">
    <table class="table table-fa-right-margin table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>nick</th>
          <th>name</th>
          <th>surname</th>
          <th>email</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?> 
        <tr>
          <th><?=$a->id();?></th>
          <td><?=$a->nick();?></td>
          <td><?=$a->firstName();?></td>
          <td><?=$a->surname();?></td>
          <td><?=$a->email();?></td>
          <td>
            <a href="<?=$a->editUrl();?>" class="btn btn-block btn-success btn-xs btn-flat">
              <i class="fa fa-edit"></i> Edit
            </a>
            <a href="<?=$a->delUrl();?>" class="btn btn-block btn-warning btn-xs btn-flat">
              <i class="fa fa-minus"></i> Delete
            </a>
          </td>
        </tr>
      <?php endwhile;?> 
      </tbody>
    </table>
  </div>
  <?php if ($this->loop->isPagination()): ?> 
  <div class="box-footer clearfix">
      <?=$this->loop->nav(['ul' => 'pagination pagination no-margin pull-right', 'current' => 'active'], 2);?>
  </div>
  <?php endif;?> 
</div> 

<?php else: ?> 
  <div class="callout callout-info">Brak pozycji do wyświetlenia!</div>
<?php endif;?> 

<?php include '_foot.html.php'; ?>