<?php include '_head.html.php';?>

<section class="content">
  <div class='row'>
    <div class="col-md-12">
      <?=$this->alerts(); ?>
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
                <input type="text" id="title" name="title" value="<?=$this->album->title('raw');?>" class="form-control input-lg" placeholder="Tytuł" required>
              </div>

              <div class="form-group">
                <label for="thumb">Miniatura</label>
                <?php //$adminFields->pathInput($this->album->thumb(), 'thumb', 'form-control', 'Miniatura', 'thumb');?>
                <input type="text" id="thumb" name="thumb" value="<?=$this->album->thumb('raw');?>" placeholder="Miniatura" class="form-control">
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <p class="text-muted">
                      Miniatura wyróżniająca album.
                      Możesz wpisać ręcznie adres miniatury w pole powyżej, lub użyć menadżera plików, 
                      w którym możesz wysłać miniaturę na serwer i który ją automatycznie wstawi.
                    </p>
                  </div>
                  <div class="col-md-6" id="thumbnail-preview">
                    <?=$this->album->thumbnail(300, 250, false, $this->album->title('raw'), 'https://placehold.it/300x250');?> 
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="album">Album</label>
                <input type="text" id="album" name="album" value="<?=$this->album->album('raw');?>" placeholder="Album" class="form-control">
                <p class="text-muted">Adres albumu</p>
              </div>

              <div class="form-group">
                <label for="photos">Liczba zdjęć</label>
                <input type="number" min="0" id="photos" name="photos" value="<?=$this->album->photos();?>" placeholder="Liczba zdjęć" class="form-control">
                <p class="text-muted">Liczba zdjęć w albumie</p>
              </div>
            </div>

            <!-- more -->
            <div class="tab-pane" id="more">

              <div class="form-group">
                <label for="date">Data wyświetlana</label>
                <input type="text" id="date" name="date" value="<?=$this->album->date();?>" placeholder="Data wyświetlana" class="form-control">
                <?php //$adminFields->datetimeInput($this->album->date(), 'date', 'form-control', 'date', 'Data wyświetlana');?> 
                <p class="text-muted">Data dodania, wyświetlana odwiedzającym stronę. Choć można ją zmienić, zalecane jest by przedstawiała prawdziwą datę publikacji albumu.</p>
              </div>

              <div class="form-group">
                <label for="slug">URL</label>
                <input type="text" id="slug" name="slug" value="<?=$this->album->slug('raw');?>" placeholder="URL" class="form-control">
                <p class="text-muted">Adres pod jakim będzie dostępny album (http://twojastrona.pl/artykuly/<?=$this->album->date('Y');?>/<?=$this->album->date('m');?>/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
              </div>

              <div class="form-group">
                <label for="author">Autor wyświetlany</label>
                <input type="text" id="author" name="author" value="<?=$this->album->author('raw', false);?>" placeholder="Autor wyświetlany" class="form-control">
                <p class="text-muted">Autor albumu. Gdy pole puste, wyświetlanie jako autora osoby która dodała album.</p>
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
            <p><i class="fa fa-key"></i> Status: <b><?=($this->album->isPublished()) ? 'opublikowany' : 'szkic';?></b></p>
            <!--<p><i class="fa fa-eye"></i> Widoczność: <b>wszędzie</b></p>-->
            <p><i class="fa fa-calendar"></i> Data wyświetlana: <b><?=$this->album->date();?></b></p>

            <!-- checkbox -->
            <hr>
            <label>
            <input type="checkbox" name="published" class="minimal"<?=($this->album->isPublished()) ? ' checked' : '';?>>&nbsp;
            <?php if (!$this->album->isPublished()):?>Zaznacz, by opublikować<?php else: ?>Odznacz, by zamienić w szkic<?php endif;?>
            </label>
          </div>
          
          <div class="box-footer with-border">
            <?php if ('edit' === $this->templateType): ?><a href="<?=$this->album->delUrl();?>" class="btn text-red">Usuń</a>
            <input name="update" type="submit" class="btn btn-primary btn-flat pull-right" value="Aktualizuj"><?php else: ?>
            <input name="add" type="submit" class="btn btn-primary btn-flat pull-right" value="Dodaj"><?php endif; ?>
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
              <option value="0">(brak)</option>
              <?php foreach ($this->categories() as $key => $value): ?><option <?=($value['id'] == $this->album->categoryID()) ? 'selected="selected" ' : '';?>value="<?=$value['id'];?>"><?=$value['title'];?></option>
              <?php endforeach; ?> 
            </select>
            
            <hr>
            <a href="<?=$this->album->addCategory();?>" target="_blank">Dodaj kategorię</a>
            <p class="text-muted">Po dodaniu kategorii, by wyświetliła się w menu powyżej, wymagane jest odświeżenie strony.</p>
          </div>
        </div>

        <?php if ('edit' === $this->templateType): ?><!-- info box -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Informacje</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <p>Dodano: <b><?=$this->album->added();?></b></p>
            <p>Dodał: <b><?=$this->album->adderFullName();?></b></p>
            <?php if ($this->album->isModified()):?> 
              <p>Ostatnia modyfikacja: <b><?=$this->album->modified();?></b></p>
              <p>Ostatnio edytował: <b><?=$this->album->modifierFullName();?></b></p>
            <?php endif; ?> 
            <p>Odsłon: <b><?=$this->album->views();?></b></p>
            <p>zobacz: <b><a target="_blank" href="<?=$this->album->url();?>">link</a></b></p>
          </div>
        </div><?php endif; ?> 

      </div>
    </form>
  </div>
</section>

<?php include '_foot.html.php';?>