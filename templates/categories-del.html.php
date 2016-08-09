<?php include '_head.html.php';?>

<form method="post" action="<?=$this->path;?>">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Czy na pewno chcesz usunąć?</h3>
    </div>
    <div class="box-body">
      <p>Tytuł: <b><?=$this->category->title();?></b></p>
    </div>
    <div class="box-footer with-border">
       <a href="<?=DIR;?>/admin/articles/categories/list" class="btn">Anuluj</a>
      <input name="delete" type="submit" class="btn btn-danger btn-flat pull-right" value="Usuń">
    </div> 
  </div>
</form>

<?php include '_foot.html.php';?>