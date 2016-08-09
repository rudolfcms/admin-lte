<?php

$item = $this->page;
include '_head.html.php';?>

<form method="post" action="<?=$this->path;?>">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Czy na pewno chcesz usunąć?</h3>
    </div>
    <div class="box-body">
      <p>Tytuł: <b><?=$item->title();?></b></p>
      <p><i class="fa fa-key"></i> Status:
        <b><?=($item->isPublished()) ? 'opublikowany' : 'szkic';?></b>
      </p>
    </div>
    <div class="box-footer with-border">
       <a href="<?=DIR;?>/admin/pages/list" class="btn">Anuluj</a>
      <input name="delete" type="submit" class="btn btn-danger btn-flat pull-right" value="Usuń">
    </div> 
  </div>
</form>

<?php include '_foot.html.php';?>