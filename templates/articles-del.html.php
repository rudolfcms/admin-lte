<?php include '_head.html.php';?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?=$this->alerts(); ?> 
        </div>

        <?php if (!$this->isAlerts()): ?><form method="post" action="<?=$this->path;?>">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Czy na pewno chcesz usunąć?</h3>
                </div>
                <div class="box-body">
                    <p>Tytuł: <b><?=$this->article->title();?></b></p>
                    <p><i class="fa fa-key"></i> Status: <b><?=($this->article->isPublished()) ? 'opublikowany' : 'szkic';?></b></p>
                    <!--<p><i class="fa fa-eye"></i> Widoczność: <b>wszędzie</b></p>-->
                    <p><i class="fa fa-calendar"></i> Data wyświetlana: <b><?=$this->article->date();?></b></p>
                </div>
                
                <div class="box-footer with-border">
                   <a href="<?=DIR;?>/admin/articles/list" class="btn">Anuluj</a>
                    <input name="delete" type="submit" class="btn btn-danger btn-flat pull-right" value="Usuń">
                </div> 
            </div>
        </form><?php endif;?>
    </div>
</section>

<?php include '_foot.html.php';?>