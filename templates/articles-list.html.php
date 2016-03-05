<?php include '_head.html.php'; ?>

<?php if($this->isArticles()): ?>
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
<?php while($this->haveArticles()): $this->article(); ?> 
		<tr>
			<th><?=$this->id();?></th>
			<td><?=$this->title();?></td>
			<td><?=$this->views();?></td>
			<td><?=$this->date();?></td>
			<td><?=$this->author();?></td>
			<td>
				<a href="<?=$this->editUrl();?>" class="btn btn-block btn-success btn-xs btn-flat">Edytuj</a>
				<a href="<?=$this->deltUrl();?>" class="btn btn-block btn-warning btn-xs btn-flat">Usuń</a>
				<a href="<?=$this->url();?>" class="btn btn-block btn-info btn-xs btn-flat">Zobacz</a>
			</td>
		</tr>
<?php endwhile;?> 
	</tbody>
</table>

<?php if($this->isPagination()): ?> 
	<nav role="navigation" class="pagination-container">
		<?=$this->nav(['ul'=>'pagination', 'current'=>'active'], 2);?>
	</nav>
<?php endif;?> 

<?php else: ?> 
	<div class="alert info">Brak artykułów do wyświetlenia!</div>
<?php endif;?> 

<?php include '_foot.html.php'; ?>