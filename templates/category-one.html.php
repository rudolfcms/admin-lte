<?php

$c = $this->category;
include '_head.html.php';?>

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
              <input type="text" id="title" name="title" value="<?=$c->title();?>" class="form-control input-lg" placeholder="Tytuł" required>
            </div>
            <?php //$adminFields->textarea($c->content($parsed = false), 'content', 'form-control', 'content', 'Treść');?>
            <label for="content">Treść</label>
            <textarea id="content" name="content" class="form-control" cols="30" rows="15"><?=$c->content();?></textarea>
          </div>
          <div class="tab-pane" id="more">
            <div class="form-group">
              <label for="description">Opis artykułu</label>
              <input type="text" id="description" name="description" value="<?=$c->description();?>" placeholder="Opis" class="form-control">
              <p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać zawartość artykułu. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
            </div>
            <div class="form-group">
              <label for="keywords">Słowa kluczowe</label>
              <input type="text" id="keywords" name="keywords" value="<?=$c->keywords();?>" placeholder="Słowa kluczowe" class="form-control">
              <p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać mniej znane wyszukiwarki.</p>
            </div>
            <div class="form-group">
              <label for="slug">URL</label>
              <input type="text" id="slug" name="slug" value="<?=$c->slug();?>" placeholder="URL" class="form-control">
              <p class="text-muted">Adres pod jakim będzie dostępny artykuł (http://twojastrona.pl/artykuly/kategorie/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
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
        <div class="box-footer with-border">
          <?php if ('edit' === $this->templateType): ?> 
          <a href="<?=$c->delUrl();?>" class="btn text-red">Usuń</a>
          <input name="update" type="submit" class="btn btn-primary btn-flat pull-right" value="Aktualizuj"><?php else: ?> 
          <input name="add" type="submit" class="btn btn-primary btn-flat pull-right" value="Dodaj">
          <?php endif; ?>
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
          <p>Dodano: <b><?=$c->added();?></b></p>
          <p>Dodał: <b><?=$c->adderFullName();?></b></p>
          <?php if ($c->isModified()): ?> 
          <p>Ostatnia modyfikacja: <b><?=$c->modified(); ?></b></p>
          <p>Ostatnio edytował: <b><?=$c->modifierFullName(); ?></b></p>
          <?php endif;?> 
          <p>Odsłon: <b><?=$c->views();?></b></p>
          <p>zobacz: <b><a target="_blank" href="<?=$c->url();?>">link</a></b></p>
        </div>
      </div> 
      <?php endif;?> 
    </div>
  </div>
</form>

<?php include '_foot.html.php';?>