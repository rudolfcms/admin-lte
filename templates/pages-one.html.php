<?php

$p = $this->page;
include '_head.html.php'; ?>

<form method="post" action="<?=$this->path;?>">
  <div class="row">
    <div class="col-md-8">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#standard" data-toggle="tab">Podstawowe</a></li>
          <li><a href="#more" data-toggle="tab">Więcej</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="standard">
            <div class="form-group">
              <label for="title">Tytuł</label>
              <input type="text" id="title" name="title" value="<?=$p->title('raw');?>" class="form-control input-lg" placeholder="Tytuł" required>
            </div>
            <?php //$pdminFields->textarea($p->content($parsed = false), 'content', 'form-control', 'content', 'Treść');?>
            <label for="content">Treść</label>
            <textarea id="content" name="content" class="form-control" cols="30" rows="25"><?=$p->textarea();?></textarea>
          </div>
          <div class="tab-pane" id="more">
            <div class="form-group">
              <label for="description">Opis strony</label>
              <input type="text" id="description" name="description" value="<?=$p->description('raw');?>" placeholder="Opis" class="form-control">
              <p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać zawartość strony. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
            </div>
            <div class="form-group">
              <label for="keywords">Słowa kluczowe</label>
              <input type="text" id="keywords" name="keywords" value="<?=$p->keywords('raw');?>" placeholder="Słowa kluczowe" class="form-control">
              <p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać mniej znane wyszukiwarki.</p>
            </div>
            <div class="form-group">
              <label for="slug">URL</label>
              <input type="text" id="slug" name="slug" value="<?=$p->slug('raw');?>" placeholder="URL" class="form-control">
              <p class="text-muted">Adres pod jakim będzie dostępny page (http://twojastrona.pl/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
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
          <p><i class="fa fa-key"></i> Status: <b><?=($p->isPublished()) ? 'opublikowany' : 'szkic';?></b></p>
          <hr>
          <label>
            <input type="checkbox" name="published" class="minimal"<?=($p->isPublished()) ? ' checked' : '';?>>&nbsp;
            <?php if (!$p->isPublished()):?> 
            Zaznacz, by opublikować
            <?php else: ?> 
            Odznacz, by zamienić w szkic
            <?php endif;?> 
          </label>
        </div>
        <div class="box-footer with-border">
          <?php if ('edit' === $this->templateType): ?> 
          <a href="<?=$p->delUrl();?>" class="btn text-red">Usuń</a>
          <input name="update" type="submit" class="btn btn-primary btn-flat pull-right" value="Aktualizuj"> 
          <?php else: ?>
          <input name="add" type="submit" class="btn btn-primary btn-flat pull-right" value="Dodaj">
          <?php endif; ?> 
        </div>
      </div>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Strona nadrzędna</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <select class="form-control select2" name="parent_id">
            <option value="0">(brak)</option>
            <?php foreach ($this->pages() as $key => $value): ?> 
              <option <?=($value['id'] == $p->parentID()) ? 'selected="selected" ' : '';?>value="<?=$value['id'];?>"><?=$value['title'];?></option>
            <?php endforeach; ?> 
          </select>
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
          <p>Dodano: <b><?=$p->added();?></b></p>
          <p>Dodał: <b><?=$p->adderFullName();?></b></p>
          <?php if ($p->isModified()): ?> 
            <p>Ostatnia modyfikacja: <b><?=$p->modified();?></b></p>
            <p>Ostatnio edytował: <b><?=$p->modifierFullName();?></b></p>
          <?php endif; ?> 
          <p>Odsłon: <b><?=$p->views();?></b></p>
          <p>zobacz: <b><a target="_blank" href="<?=$p->url();?>">link</a></b></p>
        </div>
      </div><?php endif; ?> 
    </div>
  </div>
</form>

<?php include '_foot.html.php';?>