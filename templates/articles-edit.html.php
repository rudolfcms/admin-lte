<?php include '_head.html.php';?>

<section class="content">
	<div class='row'>
		<div class="col-md-12">
			<?php //$this->allAlerts(); ?>
		</div>

		<!-- form -->
		<form method="post" action="<?=APP_DIR . $this->request;?>">
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
								<input type="text" name="title" value="<?=$this->title();?>" class="form-control input-lg" placeholder="Tytuł" required/>
							</div>
							<?php //$adminFields->textarea($this->content($parsed = false), 'content', 'form-control', 'content', 'Treść');?>
							<textarea class="form-control" name="content" id="content" cols="30" rows="30"><?=$this->textarea();?></textarea>
						</div>

						<!-- more -->
						<div class="tab-pane" id="more">

							<div class="form-group">
								<label>Opis artykułu</label>
								<input type="text" name="description" value="<?=$this->description();?>" placeholder="Opis" class="form-control"/>
								<p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać zawartość artykułu. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
							</div>

							<div class="form-group">
								<label>Słowa kluczowe</label>
								<input type="text" name="keywords" value="<?=$this->keywords();?>" placeholder="Słowa kluczowe" class="form-control"/>
								<p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać mniej znane wyszukiwarki.</p>
							</div>

							<div class="form-group">
								<label for="datetime">Data wyświetlana</label>
								<input type="text" name="datetime" value="<?=$this->date();?>" placeholder="Data wyświetlana" class="form-control"/>
								<?php //$adminFields->datetimeInput($this->date(), 'datetime', 'form-control', 'datetime', 'Data wyświetlana');?> 
								<p class="text-muted">Data dodania, wyświetlana odwiedzającym stronę. Choć można ją zmienić, zalecane jest by przedstawiała prawdziwą datę publikacji artykułu.</p>
							</div>

							<div class="form-group">
								<label>URL</label>
								<input type="text" name="url" value="<?=$this->slug();?>" placeholder="URL" class="form-control"/>
								<p class="text-muted">Adres pod jakim będzie dostępny artykuł (http://twojastrona.pl/artykuly/<?=$this->date('Y');?>/<?=$this->date('m');?>/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
							</div>

							<div class="form-group">
								<label>Autor wyświetlany</label>
								<input type="text" name="real_author" value="<?=$this->author(false);?>" placeholder="Autor wyświetlany" class="form-control"/>
								<p class="text-muted">Autor artykułu. Gdy pole puste, wyświetlanie jako autora osoby która dodała artykuł.</p>
							</div>

							<hr/>

							<div class="form-group">
								<label>Miniatura</label>
								<?php //$adminFields->pathInput($this->thumb(), 'thumb', 'form-control', 'Miniatura', 'thumb');?>
								<input type="text" name="thumb" value="<?=$this->thumb();?>" placeholder="Miniatura" class="form-control"/>
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
										<?=$this->thumbnail(300, 250);?>
										<?php if(!$this->hasThumbnail()): ?>
											<img src="data:image/jpeg;base64,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uKmhuI5xlGz6jvWFTkdo3DIcEUAdBVXUP+PQ/UU62uluE9HHUU3UP+PQ/UUAZ1l/x+R/U1t1iWX/AB+R/U1t0AFFFFABRRRQBRf77fWih/vt9aKALFt9w/WpqhtvuH61NQAUUUUAFVdQ/wCPRvqP51aqrqH/AB6N9R/OgDNtP+PuP61uVh2n/H3H9a3KACiikLBRknAHrQAtFMSWOT7jhvpRIgkjKEkA+lAGde3m8mKM/L3PrVGpri3e3fB5U9D61DQAUUUUAOR2jcMpwRV6e6W4sj2cEZFZ9FAE9l/x+R/X+lbdYll/x+R/X+lbdABRRRQAUUUUAUX++31oof77fWigCxbfcP1qaobb7h+tTUAFFFFABVXUP+PRvqP51aqrqH/Ho31H86AM20/4+4/rW5WFbMEuUZjgA8mrVxqBbKw8D+9QBcnu44Byct/dFZU9zJOfmOF/ujpUJJJyTk0UAKGKnIJB9qtw6jInEg3j171TooA2PMhvYigbk9j1FZMiGOQo3UHFICVOQcH1oZ2dizEknuaAEooooAKKKKAJ7L/j8j+v9K26xLL/AI/I/r/StugAooooAKKKKAKL/fb60UP99vrRQBYtvuH61NUNt9w/WpqACiiigAqrqH/Ho31H86tUyaITRlG6GgDAorS/ssf89T/3zR/ZY/56/wDjv/16AM2itL+yx/z1/wDHf/r0f2WP+ev/AI7/APXoAzaK0v7LH/PX/wAd/wDr0f2WP+ev/jv/ANegDNorS/ssf89f/Hf/AK9H9lj/AJ6/+O//AF6AM2itL+yx/wA9f/Hf/r0f2WP+ev8A47/9egDNorS/ssf89f8Ax3/69H9lj/nr/wCO/wD16AKll/x+R/X+lbdVILBYJA5csR04xVugAooooAKKKKAKL/fb60UP99vrRQBYtvuH61NUNt9w/WpqACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAov8Afb60UP8Afb60UAWLb7h+tTVXt2UIckDnuam3p/eX86AHUU3en95fzo3p/eX86AHUUgZT0IP40uR60AFFGR60ZHrQAUUZHrRketABRRketGR60AFFGR60ZHrQAUUZHrRketABRRketGR60AFFGR60ZHrQAUUZHrRketABRRketGR60AUX++31opH++31ooASiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD/9n/4QxTaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pgo8eDp4bXBtZXRhIHhtbG5zOng9J2Fkb2JlOm5zOm1ldGEvJz4KPHJkZjpSREYgeG1sbnM6cmRmPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjJz4KCiA8cmRmOkRlc2NyaXB0aW9uIHhtbG5zOmRjPSdodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyc+CiAgPGRjOmZvcm1hdD5pbWFnZS9qcGVnPC9kYzpmb3JtYXQ+CiA8L3JkZjpEZXNjcmlwdGlvbj4KCiA8cmRmOkRlc2NyaXB0aW9uIHhtbG5zOnBob3Rvc2hvcD0naHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyc+CiAgPHBob3Rvc2hvcDpDb2xvck1vZGU+MzwvcGhvdG9zaG9wOkNvbG9yTW9kZT4KICA8cGhvdG9zaG9wOkxlZ2FjeUlQVENEaWdlc3Q+MUE4MTdGNEQzOUUzNjY1OTJGRUI2MzE1RUZDOUI0NEU8L3Bob3Rvc2hvcDpMZWdhY3lJUFRDRGlnZXN0PgogIDxwaG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+CiAgIDxyZGY6QmFnPgogICAgPHJkZjpsaT4xMjRBMjkzM0NCOUM2RENBMTNCNDA1RjcwNzVGREI0NjwvcmRmOmxpPgogICA8L3JkZjpCYWc+CiAgPC9waG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+CiAgPHBob3Rvc2hvcDpDb2xvck1vZGU+MzwvcGhvdG9zaG9wOkNvbG9yTW9kZT4KICA8cGhvdG9zaG9wOkxlZ2FjeUlQVENEaWdlc3Q+MUE4MTdGNEQzOUUzNjY1OTJGRUI2MzE1RUZDOUI0NEU8L3Bob3Rvc2hvcDpMZWdhY3lJUFRDRGlnZXN0PgogIDxwaG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+CiAgIDxyZGY6U2VxPgogICAgPHJkZjpsaT4xMjRBMjkzM0NCOUM2RENBMTNCNDA1RjcwNzVGREI0NjwvcmRmOmxpPgogICA8L3JkZjpTZXE+CiAgPC9waG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+CiA8L3JkZjpEZXNjcmlwdGlvbj4KCiA8cmRmOkRlc2NyaXB0aW9uIHhtbG5zOnhtcD0naHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyc+CiAgPHhtcDpDcmVhdGVEYXRlPjIwMTMtMDItMDJUMTI6MTg6MjgrMDE6MDA8L3htcDpDcmVhdGVEYXRlPgogIDx4bXA6Q3JlYXRvclRvb2w+QWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cyk8L3htcDpDcmVhdG9yVG9vbD4KICA8eG1wOk1ldGFkYXRhRGF0ZT4yMDEzLTA1LTA0VDAwOjQyOjE4KzA4OjAwPC94bXA6TWV0YWRhdGFEYXRlPgogIDx4bXA6TW9kaWZ5RGF0ZT4yMDEzLTA1LTA0VDAwOjQyOjE4KzA4OjAwPC94bXA6TW9kaWZ5RGF0ZT4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24geG1sbnM6eG1wTU09J2h0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8nPgogIDx4bXBNTTpJbnN0YW5jZUlEPnhtcC5paWQ6QkJGNDU5NkIxMEI0RTIxMUJFQTdCRUEwNzBENjk4NkE8L3htcE1NOkluc3RhbmNlSUQ+CiAgPHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD54bXAuZGlkOjQyNjhBNTg4MjY2REUyMTFBMDlCRTc3OTNFQTlCNzlCPC94bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+CiAgPHhtcE1NOkRvY3VtZW50SUQgcmRmOnJlc291cmNlPSd4bXAuZGlkOjQyNjhBNTg4MjY2REUyMTFBMDlCRTc3OTNFQTlCNzlCJyAvPgogIDx4bXBNTTpJbnN0YW5jZUlEPnhtcC5paWQ6QkJGNDU5NkIxMEI0RTIxMUJFQTdCRUEwNzBENjk4NkE8L3htcE1NOkluc3RhbmNlSUQ+CiAgPHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD54bXAuZGlkOjQyNjhBNTg4MjY2REUyMTFBMDlCRTc3OTNFQTlCNzlCPC94bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+CiAgPHhtcE1NOkhpc3Rvcnk+CiAgIDxyZGY6U2VxPgogICA8L3JkZjpTZXE+CiAgPC94bXBNTTpIaXN0b3J5PgogPC9yZGY6RGVzY3JpcHRpb24+CgogPHJkZjpEZXNjcmlwdGlvbiB4bWxuczpleGlmPSdodHRwOi8vbnMuYWRvYmUuY29tL2V4aWYvMS4wLyc+CiAgPGV4aWY6SW1hZ2VXaWR0aD4zMDA8L2V4aWY6SW1hZ2VXaWR0aD4KICA8ZXhpZjpJbWFnZUxlbmd0aD4yNTA8L2V4aWY6SW1hZ2VMZW5ndGg+CiAgPGV4aWY6Qml0c1BlclNhbXBsZT44LCA4LCA4PC9leGlmOkJpdHNQZXJTYW1wbGU+CiAgPGV4aWY6T3JpZW50YXRpb24+VG9wLWxlZnQ8L2V4aWY6T3JpZW50YXRpb24+CiAgPGV4aWY6U2FtcGxlc1BlclBpeGVsPjM8L2V4aWY6U2FtcGxlc1BlclBpeGVsPgogIDxleGlmOlhSZXNvbHV0aW9uPjcyLDAwMDA8L2V4aWY6WFJlc29sdXRpb24+CiAgPGV4aWY6WVJlc29sdXRpb24+NzIsMDAwMDwvZXhpZjpZUmVzb2x1dGlvbj4KICA8ZXhpZjpSZXNvbHV0aW9uVW5pdD5JbmNoPC9leGlmOlJlc29sdXRpb25Vbml0PgogIDxleGlmOlNvZnR3YXJlPkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93czwvZXhpZjpTb2Z0d2FyZT4KICA8ZXhpZjpEYXRlVGltZT4yMDEzOjA1OjA0IDAwOjQyOjE4PC9leGlmOkRhdGVUaW1lPgogIDxleGlmOllDYkNyUG9zaXRpb25pbmc+Q2VudGVyZWQ8L2V4aWY6WUNiQ3JQb3NpdGlvbmluZz4KICA8ZXhpZjpDb21wcmVzc2lvbj5KUEVHIGNvbXByZXNzaW9uPC9leGlmOkNvbXByZXNzaW9uPgogIDxleGlmOlhSZXNvbHV0aW9uPjcyPC9leGlmOlhSZXNvbHV0aW9uPgogIDxleGlmOllSZXNvbHV0aW9uPjcyPC9leGlmOllSZXNvbHV0aW9uPgogIDxleGlmOlJlc29s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" width="300" height="250"/>
										<?php endif;?>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label>Album</label>
								<input type="text" name="album" value="<?=$this->album();?>" placeholder="Album" class="form-control"/>
								<p class="text-muted">Adres albumu powiązanego z artykułem. Pole puste = brak powiązania.</p>
							</div>

							<div class="form-group">
								<label>Liczba zdjęć</label>
								<input type="number" min="0" name="photos" value="<?=$this->photos();?>" placeholder="Liczba zdjęć" class="form-control"/>
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
						<p><i class="fa fa-key"></i> Status: <b><?=($this->isPublished()) ? 'opublikowany' : 'szkic';?></b></p>
						<!--<p><i class="fa fa-eye"></i> Widoczność: <b>wszędzie</b></p>-->
						<p><i class="fa fa-calendar"></i> Data wyświetlana: <b><?=$this->date();?></b></p>

						<!-- checkbox -->
						<hr/>
						<label>
						<input type="checkbox" name="published" class="minimal"<?=($this->isPublished()) ? ' checked' : '';?>/>&nbsp;
						<?php if(!$this->isPublished()) { ?>Zaznacz, by opublikować<?php } else { ?>Odznacz, by zamienić w szkic<?php } ?>
						</label>
						
						
					</div>
					<div class="box-footer with-border">
						<a href="<?=$this->delUrl();?>" class="btn text-red">Usuń</a>
						<input name="update" type="submit" class="btn btn-primary btn-flat pull-right" value="Aktualizuj"/>
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
							<?php //foreach ($this->categories() as $key => $value) { 
							?><option <?php//=($value['id']===$this->categoryId()) ? 'selected="selected" ' : '';?>value="<?=$value['id'];?>"><?=$value['title'];?></option>
							<?php //}	?>-->
						
						</select>
						
						<hr/>
						<a href="<?=$this->addCategory();?>" target="_blank">Dodaj kategorię</a>
						<p class="text-muted">Po dodaniu kategorii, by wyświetliła się w menu powyżej, wymagane jest odświerzenie strony.</p>
					</div>
				</div>

				<!-- info box -->
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Informacje</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<p>Dodano: <b><?=$this->added();?></b></p>
						<p>Dodał: <b><?=$this->adderFullName();?></b></p>
						<?php if($this->isModified()) { ?><p>Ostatnia modyfikacja: <b><?=$this->modified();?></b></p>
						<p>Ostatnio edytował: <b><?=$this->modifierFullName();?></b></p><?php } ?>
						<p>Odsłon: <b><?=$this->views();?></b></p>
						<p>zobacz: <b><a target="_blank" href="<?=$this->url();?>">link</a></b></p>
					</div>
				</div>

			</div>
		</form>
	</div>
</section>

<?php include '_foot.html.php';?>