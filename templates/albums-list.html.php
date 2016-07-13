<?php include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>views</th>
            <th>added</th>
            <th>author</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
<?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?> 
        <tr>
            <th><?=$a->id();?></th>
            <td><?=$a->title();?></td>
            <td><?=$a->views();?></td>
            <td><?=$a->date();?></td>
            <td><?=$a->author();?></td>
            <td>
                <a href="<?=$a->editUrl();?>" class="btn btn-block btn-success btn-xs btn-flat">Edytuj</a>
                <a href="<?=$a->delUrl();?>" class="btn btn-block btn-warning btn-xs btn-flat">Usuń</a>
                <a href="<?=$a->url();?>" class="btn btn-block btn-info btn-xs btn-flat">Zobacz</a>
            </td>
        </tr>
<?php endwhile;?> 
    </tbody>
</table>

<?php if ($this->loop->isPagination()): ?> 
    <nav role="navigation" class="pagination-container">
        <?=$this->loop->nav(['ul' => 'pagination', 'current' => 'active'], 2);?>
    </nav>
<?php endif;?> 

<?php else: ?> 
    <div class="alert info">Brak artykułów do wyświetlenia!</div>
<?php endif;?> 

<?php include '_foot.html.php'; ?>