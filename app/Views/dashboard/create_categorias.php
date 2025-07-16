<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title><?= $page_title; ?> | Dashtreme Admin</title>
  <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/pace.min.css'); ?>" rel="stylesheet"/>
  <script src="<?= base_url(RECURSOS_ADMIN_JS . '/pace.min.js'); ?>"></script>
  <link rel="icon" href="<?= base_url('assets/images/favicon.ico'); ?>" type="image/x-icon">
  <link href="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/fullcalendar/css/fullcalendar.min.css'); ?>" rel='stylesheet'/>
  <link href="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/simplebar/css/simplebar.css'); ?>" rel="stylesheet"/>
  <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/bootstrap.min.css'); ?>" rel="stylesheet"/>
  <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/animate.css'); ?>" rel="stylesheet" type="text/css"/>
  <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/icons.css'); ?>" rel="stylesheet" type="text/css"/>
  <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/sidebar-menu.css'); ?>" rel="stylesheet"/>
  <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/app-style.css'); ?>" rel="stylesheet"/>
  
</head>

<body class="bg-theme">

  <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
  <div id="wrapper">
  
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
      <a href="<?= base_url('dashboard/index'); ?>">
        <img src="<?= base_url('assets/images/logo-icon.png'); ?>" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">Dashtreme Admin</h5>
      </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="<?= base_url('dashboard'); ?>">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="<?= base_url('forms'); ?>">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Forms</span>
        </a>
      </li>

      <li>
        <a href="<?= base_url('resultado'); ?>">
          <i class="zmdi zmdi-grid"></i> <span>Resultados</span>
        </a>
      </li>

      <li>
        <a href="<?= base_url('categorias'); ?>">
          <i class="zmdi zmdi-calendar-check"></i> <span>Categorias</span>
        </a>
      </li>

      <li>
        <a href="<?= base_url('users'); ?>">
          <i class="zmdi zmdi-face"></i> <span>Usuarios</span>
        </a>
      </li>

    </ul>
    
    </div>
    <header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
          <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
      
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    <li class="nav-item language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
            <p class="user-subtitle">mccoy@example.com</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<div class="clearfix"></div>
    
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <h1><?= $page_title; ?></h1>

          <?php if (session()->getFlashdata('success')): ?>
              <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
          <?php endif; ?>
          <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
          <?php endif; ?>

          <div class="card">
              <div class="card-header">
                  <h5>Crear Nueva Categoría</h5>
              </div>
              <div class="card-body">
                  <?= form_open('categorias/store'); ?>
                      <?= csrf_field(); ?>

                      <div class="form-group mb-3">
                          <label for="nombre" class="form-label">Nombre de la Categoría</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" value="<?= old('nombre'); ?>" required>
                          <?php if (isset($validation) && $validation->hasError('nombre')): ?>
                              <div class="text-danger"><?= $validation->getError('nombre'); ?></div>
                          <?php endif; ?>
                      </div>

                      <div class="form-group mb-3">
                          <label for="descripcion" class="form-label">Descripción</label>
                          <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= old('descripcion'); ?></textarea>
                          <?php if (isset($validation) && $validation->hasError('descripcion')): ?>
                              <div class="text-danger"><?= $validation->getError('descripcion'); ?></div>
                          <?php endif; ?>
                      </div>

                      <button type="submit" class="btn btn-primary">Guardar Categoría</button>
                      <a href="<?= base_url('categorias'); ?>" class="btn btn-secondary">Cancelar</a>
                  <?= form_close(); ?>
              </div>
          </div>
        </div>
      </div>
      <div class="overlay toggle-menu"></div>
    </div>
    </div><a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer>
  <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">
      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
    <li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
      </div>
    </div>
  </div><script src="<?= base_url(RECURSOS_ADMIN_JS . '/jquery.min.js'); ?>"></script>
  <script src="<?= base_url(RECURSOS_ADMIN_JS . '/popper.min.js'); ?>"></script>
  <script src="<?= base_url(RECURSOS_ADMIN_JS . '/bootstrap.min.js'); ?>"></script>
  
  <script src="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/simplebar/js/simplebar.js'); ?>"></script>
  <script src="<?= base_url(RECURSOS_ADMIN_JS . '/sidebar-menu.js'); ?>"></script>
  
  <script src="<?= base_url(RECURSOS_ADMIN_JS . '/app-script.js'); ?>"></script>
  
  <script src='<?= base_url(RECURSOS_ADMIN_PLUGINS . '/fullcalendar/js/moment.min.js'); ?>'></script>
  <script src='<?= base_url(RECURSOS_ADMIN_PLUGINS . '/fullcalendar/js/fullcalendar.min.js'); ?>'></script>
  <script src="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/fullcalendar/js/fullcalendar-custom-script.js'); ?>"></script>
  
</body>
</html>