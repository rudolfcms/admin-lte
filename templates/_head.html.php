<?php $path = $this->themePath;?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php $this->head->title();?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=$path;?>/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=$path;?>/bower_components/AdminLTE/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?=$path;?>/bower_components/AdminLTE/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=$path;?>/bower_components/AdminLTE/dist/css/skins/skin-green.min.css">
    <style>
      .table-fa-right-margin .fa {
        margin-right: 5px;
      }
    </style>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?=$this->adminDir();?>" class="logo">
          <span class="logo-mini"><b>A</b>LT</span>
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=$path;?>/bower_components/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?=$this->getUserFullName();?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?=$path;?>/bower_components/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?=$this->getUserFullName();?> - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div>
                    </div>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=DIR;?>/user/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=DIR;?>/user/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=$path;?>/bower_components/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?=$this->getUserFullName();?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>

          <?=$this->pageNav('main', 3,
            ['li_active' => 'active',
              'root_ul' => 'sidebar-menu',
              'sub_ul' => 'treeview-menu',
              'li_with_ul' => 'treeview', ],
            ['first_root_li' => '<li class="header" style="text-transform: uppercase">header</li>'],
            ['li_with_ul_a_text' => '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>'],
            ['li_a_text-container' => 'span',
              'li_a_ico-container' => 'i',
              'li_a_ico-class_base' => 'fa', ]
          ); ?> 
        </section>
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1><?=$this->pageTitle();?></h1>
          <?=$this->breadcrumb($nesting = 2, ['ul' => 'breadcrumb', 'li_active' => 'active']);?> 
        </section>

        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <?=$this->alerts(); ?> 
            </div>
          </div>
