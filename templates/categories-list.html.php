<?php include '_head.html.php';?>

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
          <th>title</th>
          <th>added</th>
          <th>added</th>
          <th>items</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($this->loop->haveItems()): $c = $this->loop->item(); ?><tr>
          <th><?=$c->id();?></th>
          <td><?=$c->title();?></td>
          <td><?=$c->adderFullName();?></td>
          <td><?=$c->added();?></td>
          <td><?=$c->total();?></td>
          <td>
            <a href="<?=$c->editUrl();?>" class="btn btn-success btn-xs btn-flat">
              <i class="fa fa-edit"></i> Edit
            </a>
            <a href="<?=$c->url();?>" class="btn btn-info btn-xs btn-flat">
              <i class="fa fa-eye"></i> View
            </a>
            <a href="<?=$c->delUrl();?>" class="btn btn-warning btn-xs btn-flat">
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