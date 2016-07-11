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
                                <input type="text" id="title" name="title" value="<?=$this->category->title();?>" class="form-control input-lg" placeholder="Tytuł" required/>
                            </div>
                            <?php //$adminFields->textarea($this->category->content($parsed = false), 'content', 'form-control', 'content', 'Treść');?>
                            <label for="content">Treść</label>
                            <textarea id="content" name="content" class="form-control" cols="30" rows="15"><?=$this->category->content();?></textarea>
                        </div>

                        <!-- more -->
                        <div class="tab-pane" id="more">

                            <div class="form-group">
                                <label for="description">Opis artykułu</label>
                                <input type="text" id="description" name="description" value="<?=$this->category->description();?>" placeholder="Opis" class="form-control"/>
                                <p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać zawartość artykułu. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
                            </div>

                            <div class="form-group">
                                <label for="keywords">Słowa kluczowe</label>
                                <input type="text" id="keywords" name="keywords" value="<?=$this->category->keywords();?>" placeholder="Słowa kluczowe" class="form-control"/>
                                <p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać mniej znane wyszukiwarki.</p>
                            </div>

                            <div class="form-group">
                                <label for="slug">URL</label>
                                <input type="text" id="slug" name="slug" value="<?=$this->category->slug();?>" placeholder="URL" class="form-control"/>
                                <p class="text-muted">Adres pod jakim będzie dostępny artykuł (http://twojastrona.pl/artykuly/kategorie/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
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
                    
                    <div class="box-footer with-border">
                        <?php if ('edit' === $this->templateType): ?><a href="<?=$this->category->delUrl();?>" class="btn text-red">Usuń</a>
                        <input name="update" type="submit" class="btn btn-primary btn-flat pull-right" value="Aktualizuj"/><?php else: ?>
                        <input name="add" type="submit" class="btn btn-primary btn-flat pull-right" value="Dodaj"/><?php endif; ?>
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
                        <p>Dodano: <b><?=$this->category->added();?></b></p>
                        <p>Dodał: <b><?=$this->category->adderFullName();?></b></p>
                        <?php if ($this->category->isModified()) {
    ?><p>Ostatnia modyfikacja: <b><?=$this->category->modified();
    ?></b></p>
                        <p>Ostatnio edytował: <b><?=$this->category->modifierFullName();
    ?></b></p><?php 
} ?>
                        <p>Odsłon: <b><?=$this->category->views();?></b></p>
                        <p>zobacz: <b><a target="_blank" href="<?=$this->category->url();?>">link</a></b></p>
                    </div>
                </div><?php endif; ?> 

            </div>
        </form>
    </div>
</section>

<?php include '_foot.html.php';?>