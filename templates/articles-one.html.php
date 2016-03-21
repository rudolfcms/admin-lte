<?php include '_head.html.php';?>

<section class="content">
	<div class='row'>
		<div class="col-md-12">
			<?php //$this->allAlerts(); ?>
		</div>

		<!-- form -->
		<form method="post" action="<?=$this->path;?>">
			<div class='col-md-8'>
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#standard" data-toggle="tab">Podstawowe</a></li>
						<li><a href="#more" data-toggle="tab">Więcej</a></li>
					</ul>
					
					<div class="tab-content">

						<!-- .active | title input and textarea -->
						<div class="tab-pane active" id="standard">
							<div class="form-group">
								<label for="title">Tytuł</label>
								<input type="text" id="title" name="title" value="<?=$this->article->title();?>" class="form-control input-lg" placeholder="Tytuł" required/>
							</div>
							<?php //$adminFields->textarea($this->article->content($parsed = false), 'content', 'form-control', 'content', 'Treść');?>
							<label for="content">Treść</label>
							<textarea id="content" name="content" class="form-control" cols="30" rows="25"><?=$this->article->textarea();?></textarea>
						</div>

						<!-- more -->
						<div class="tab-pane" id="more">

							<div class="form-group">
								<label for="description">Opis artykułu</label>
								<input type="text" id="description" name="description" value="<?=$this->article->description();?>" placeholder="Opis" class="form-control"/>
								<p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać zawartość artykułu. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
							</div>

							<div class="form-group">
								<label for="keywords">Słowa kluczowe</label>
								<input type="text" id="keywords" name="keywords" value="<?=$this->article->keywords();?>" placeholder="Słowa kluczowe" class="form-control"/>
								<p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać mniej znane wyszukiwarki.</p>
							</div>

							<div class="form-group">
								<label for="date">Data wyświetlana</label>
								<input type="text" id="date" name="date" value="<?=$this->article->date();?>" placeholder="Data wyświetlana" class="form-control"/>
								<?php //$adminFields->datetimeInput($this->article->date(), 'date', 'form-control', 'date', 'Data wyświetlana');?> 
								<p class="text-muted">Data dodania, wyświetlana odwiedzającym stronę. Choć można ją zmienić, zalecane jest by przedstawiała prawdziwą datę publikacji artykułu.</p>
							</div>

							<div class="form-group">
								<label for="slug">URL</label>
								<input type="text" id="slug" name="slug" value="<?=$this->article->slug();?>" placeholder="URL" class="form-control"/>
								<p class="text-muted">Adres pod jakim będzie dostępny artykuł (http://twojastrona.pl/artykuly/<?=$this->article->date('Y');?>/<?=$this->article->date('m');?>/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
							</div>

							<div class="form-group">
								<label for="author">Autor wyświetlany</label>
								<input type="text" id="author" name="author" value="<?=$this->article->author(false);?>" placeholder="Autor wyświetlany" class="form-control"/>
								<p class="text-muted">Autor artykułu. Gdy pole puste, wyświetlanie jako autora osoby która dodała artykuł.</p>
							</div>

							<hr/>

							<div class="form-group">
								<label for="thumb">Miniatura</label>
								<?php //$adminFields->pathInput($this->article->thumb(), 'thumb', 'form-control', 'Miniatura', 'thumb');?>
								<input type="text" id="thumb" name="thumb" value="<?=$this->article->thumb();?>" placeholder="Miniatura" class="form-control"/>
								<br/>
								<div class="row">
									<div class="col-md-6">
										<p class="text-muted">
											Miniatura wyróżniająca artykuł. Artykuł bez uzupełnionego tego pola (jeśli wspiera tą funkcję aktywny szablon) 
											będzie okraszony domyślną miniaturą. Możesz wpisać ręcznie adres miniatury w pole powyżej, lub użyć menadżera plików, 
											w którym możesz wysłać miniaturę na serwer i który ją automatycznie wstawi.
										</p>
									</div>
									<div class="col-md-6" id="thumbnail-preview">
										<?=$this->article->thumbnail(300, 250, false, '', 'https://placehold.it/300x250');?> 
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="album">Album</label>
								<input type="text" id="album" name="album" value="<?=$this->article->album();?>" placeholder="Album" class="form-control"/>
								<p class="text-muted">Adres albumu powiązanego z artykułem. Pole puste = brak powiązania.</p>
							</div>

							<div class="form-group">
								<label for="photos">Liczba zdjęć</label>
								<input type="number" min="0" id="photos" name="photos" value="<?=$this->article->photos();?>" placeholder="Liczba zdjęć" class="form-control"/>
								<p class="text-muted">Liczba zdjęć w powiązanym albumie.</p>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
			
			<div class="col-md-4">

				<!-- published box -->
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Publikacja</h3>
					</div>
					<div class="box-body">
						<p><i class="fa fa-key"></i> Status: <b><?=($this->article->isPublished()) ? 'opublikowany' : 'szkic';?></b></p>
						<!--<p><i class="fa fa-eye"></i> Widoczność: <b>wszędzie</b></p>-->
						<p><i class="fa fa-calendar"></i> Data wyświetlana: <b><?=$this->article->date();?></b></p>

						<!-- checkbox -->
						<hr/>
						<label>
						<input type="checkbox" name="published" class="minimal"<?=($this->article->isPublished()) ? ' checked' : '';?>/>&nbsp;
						<?php if(!$this->article->isPublished()) { ?>Zaznacz, by opublikować<?php } else { ?>Odznacz, by zamienić w szkic<?php } ?>
						</label>
					</div>
					
					<div class="box-footer with-border">
						<?php if('edit' === $this->templateType): ?><a href="<?=$this->article->delUrl();?>" class="btn text-red">Usuń</a>
						<input name="update" type="submit" class="btn btn-primary btn-flat pull-right" value="Aktualizuj"/><?php else: ?>
						<input name="add" type="submit" class="btn btn-primary btn-flat pull-right" value="Dodaj"/><?php endif; ?>
					</div> 
				</div>

				<!-- category box -->
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Kategoria</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<select class="form-control select2" name="category_id">
							<!--<option value="0">(brak)</option>
							<?php //foreach ($this->article->categories() as $key => $value) { 
							?><option <?php//=($value['id']===$this->article->categoryId()) ? 'selected="selected" ' : '';?>value="<?=$value['id'];?>"><?=$value['title'];?></option>
							<?php //}	?>-->
						
						</select>
						
						<hr/>
						<a href="<?=$this->article->addCategory();?>" target="_blank">Dodaj kategorię</a>
						<p class="text-muted">Po dodaniu kategorii, by wyświetliła się w menu powyżej, wymagane jest odświeżenie strony.</p>
					</div>
				</div>

				<?php if('edit' === $this->templateType): ?><!-- info box -->
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Informacje</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<p>Dodano: <b><?=$this->article->added();?></b></p>
						<p>Dodał: <b><?=$this->article->adderFullName();?></b></p>
						<?php if($this->article->isModified()) { ?><p>Ostatnia modyfikacja: <b><?=$this->article->modified();?></b></p>
						<p>Ostatnio edytował: <b><?=$this->article->modifierFullName();?></b></p><?php } ?>
						<p>Odsłon: <b><?=$this->article->views();?></b></p>
						<p>zobacz: <b><a target="_blank" href="<?=$this->article->url();?>">link</a></b></p>
					</div>
				</div><?php endif; ?> 

			</div>
		</form>
	</div>
</section>

<?php include '_foot.html.php';?>