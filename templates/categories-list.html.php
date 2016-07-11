<?php include '_head.html.php';?>

<section class="content">
	<div class='row'>
		<div class="col-md-12">
			<?=$this->alerts(); ?>
		</div>

		<div class="col-md-12">
		<?php if ($this->loop->isItems()): ?>
			<table class="table table-bordered table-condensed table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Tytuł</th>
						<th>Ilość</th>
						<th>Akcje</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($this->loop->haveItems()): $c = $this->loop->item(); ?><tr>
						<th><?=$c->id();?></th>
						<td><?=$c->title();?></td>
						<td><?=$c->total();?></td>
						<td>
							<a class="btn btn-success btn-xs btn-flat" href="<?=$c->editUrl();?>"><i class="fa fa-pencil"></i>&nbsp; Edytuj</a>
							<a class="btn btn-warning btn-xs btn-flat" href="<?=$c->delUrl();?>"><i class="fa fa-minus"></i> <span>&nbsp; Usuń</span></a>
							<a target="_blank" class="btn btn-info btn-xs btn-flat" href="<?=$c->url();?>"><i class="fa fa-eye"></i> <span>&nbsp; Zobacz</span></a>
						</td>
					</tr>
					<?php endwhile; ?>

				</tbody>
			</table>
		<?php else: ?>
			<div class="callout callout-info">
				Brak kategorii! Dodaj je z formularza obok.
			</div>
		<?php endif;?>
		</div>
	</div>

	<?php if ($this->loop->isPagination()): ?> 
	<nav role="navigation" class="pagination-container">
		<?=$this->loop->nav(['ul' => 'pagination', 'current' => 'active'], 2);?>
	</nav>
<?php endif;?> 
</section>

<?php include '_foot.html.php';?>