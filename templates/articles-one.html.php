<?php

$a = $this->article;
include '_head.html.php'; ?>

<form method="post" action="<?=$this->path;?>">
  <div class="row">
    <div class='col-md-8'>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#standard" data-toggle="tab">Podstawowe</a></li>
        <li><a href="#more" data-toggle="tab">Więcej</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="standard">
          <div class="form-group">
            <label for="title">Tytuł</label>
            <input type="text" id="title" name="title" value="<?=$a->title('raw');?>" class="form-control input-lg" placeholder="Tytuł" required>
          </div>
          <?php //$adminFields->textarea($a->content($parsed = false), 'content', 'form-control', 'content', 'Treść');?>
          <label for="content">Treść</label>
          <textarea id="content" name="content" class="form-control" cols="30" rows="25"><?=$a->textarea();?></textarea>
        </div>
        <div class="tab-pane" id="more">
          <div class="form-group">
            <label for="description">Opis artykułu</label>
            <input type="text" id="description" name="description" value="<?=$a->description('raw');?>" placeholder="Opis" class="form-control">
            <p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać zawartość artykułu. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
          </div>
          <div class="form-group">
            <label for="keywords">Słowa kluczowe</label>
            <input type="text" id="keywords" name="keywords" value="<?=$a->keywords('raw');?>" placeholder="Słowa kluczowe" class="form-control">
            <p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać mniej znane wyszukiwarki.</p>
          </div>
          <div class="form-group">
            <label for="date">Data wyświetlana</label>
            <input type="text" id="date" name="date" value="<?=$a->date();?>" placeholder="Data wyświetlana" class="form-control">
            <?php //$adminFields->datetimeInput($a->date(), 'date', 'form-control', 'date', 'Data wyświetlana');?> 
            <p class="text-muted">Data dodania, wyświetlana odwiedzającym stronę. Choć można ją zmienić, zalecane jest by przedstawiała prawdziwą datę publikacji artykułu.</p>
          </div>
          <div class="form-group">
            <label for="slug">URL</label>
            <input type="text" id="slug" name="slug" value="<?=$a->slug('raw');?>" placeholder="URL" class="form-control">
            <p class="text-muted">Adres pod jakim będzie dostępny artykuł (http://twojastrona.pl/artykuly/<?=$a->date('Y');?>/<?=$a->date('m');?>/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
          </div>

          <div class="form-group">
            <label for="author">Autor wyświetlany</label>
            <input type="text" id="author" name="author" value="<?=$a->author('raw', false);?>" placeholder="Autor wyświetlany" class="form-control">
            <p class="text-muted">Autor artykułu. Gdy pole puste, wyświetlanie jako autora osoby która dodała artykuł.</p>
          </div>
          <hr>
          <div class="form-group">
            <label for="thumb">Miniatura</label>
            <?php //$adminFields->pathInput($a->thumb(), 'thumb', 'form-control', 'Miniatura', 'thumb');?>
            <input type="text" id="thumb" name="thumb" value="<?=$a->thumb('raw');?>" placeholder="Miniatura" class="form-control">
            <br>
            <div class="row">
              <div class="col-md-6">
                <p class="text-muted">
                  Miniatura wyróżniająca artykuł. Artykuł bez uzupełnionego tego pola (jeśli wspiera tą funkcję aktywny szablon) 
                  będzie okraszony domyślną miniaturą. Możesz wpisać ręcznie adres miniatury w pole powyżej, lub użyć menadżera plików, 
                  w którym możesz wysłać miniaturę na serwer i który ją automatycznie wstawi.
                </p>
              </div>
              <div class="col-md-6" id="thumbnail-preview">
                <?=$a->thumbnail(300, 250, false, $a->title('raw'), 'https://placehold.it/300x250');?> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="album">Album</label>
            <input type="text" id="album" name="album" value="<?=$a->album('raw');?>" placeholder="Album" class="form-control">
            <p class="text-muted">Adres albumu powiązanego z artykułem. Pole puste = brak powiązania.</p>
          </div>
          <div class="form-group">
            <label for="photos">Liczba zdjęć</label>
            <input type="number" min="0" id="photos" name="photos" value="<?=$a->photos();?>" placeholder="Liczba zdjęć" class="form-control">
            <p class="text-muted">Liczba zdjęć w powiązanym albumie.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Publikacja</h3>
      </div>
      <div class="box-body">
        <p><i class="fa fa-key"></i> Status:
          <b><?=($a->isPublished()) ? 'opublikowany' : 'szkic';?></b>
        </p>
        <p><i class="fa fa-calendar"></i> Data wyświetlana: <b><?=$a->date();?></b></p>
        <hr>
        <label>
        <input type="checkbox" name="published" class="minimal"<?=($a->isPublished()) ? ' checked' : '';?>>&nbsp;
          <?php if (!$a->isPublished()):?> 
          Zaznacz, by opublikować
          <?php else:?> 
          Odznacz, by zamienić w szkic
          <?php endif;?> 
        </label>
      </div>
      
      <div class="box-footer with-border">
        <?php if ('edit' === $this->templateType): ?>
        <a href="<?=$a->delUrl();?>" class="btn text-red">Usuń</a>
        <input name="update" type="submit" class="btn btn-primary btn-flat pull-right" value="Aktualizuj">
        <?php else: ?> 
        <input name="add" type="submit" class="btn btn-primary btn-flat pull-right" value="Dodaj">
        <?php endif; ?> 
      </div> 
    </div>
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Kategoria</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <select class="form-control select2" name="category_ID">
          <option value="0">(brak)</option>
          <?php foreach ($this->categories() as $key => $value): ?> 
            <option <?=($value['id'] == $a->categoryID()) ? 'selected="selected" ' : '';?>value="<?=$value['id'];?>"><?=$value['title'];?></option>
          <?php endforeach; ?> 
        </select>
        <hr>
        <a href="<?=$a->addCategory();?>" target="_blank">Dodaj kategorię</a>
        <p class="text-muted">Po dodaniu kategorii, by wyświetliła się w menu powyżej, wymagane jest odświeżenie strony.</p>
      </div>
    </div>
    <?php if ('edit' === $this->templateType): ?>
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Informacje</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <p>Dodano: <b><?=$a->added();?></b></p>
        <p>Dodał: <b><?=$a->adderFullName();?></b></p>
        <?php if ($a->isModified()): ?> 
        <p>Ostatnia modyfikacja: <b><?=$a->modified();?></b></p>
        <p>Ostatnio edytował: <b><?=$a->modifierFullName();?></b></p>
        <?php endif; ?> 
        <p>Odsłon: <b><?=$a->views();?></b></p>
        <p>zobacz: <b><a target="_blank" href="<?=$a->url();?>">link</a></b></p>
      </div>
    </div><?php endif; ?> 
  </div>
  </div>
</form>

<?php include '_foot.html.php';?>