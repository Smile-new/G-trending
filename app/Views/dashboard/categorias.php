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
          <i class="zmdi zmdi-calendar-check"></i> <span>Categorías</span>
        </a>
      </li>

      <li>
        <a href="<?= base_url('users'); ?>">
          <i class="zmdi zmdi-face"></i> <span>Usuarios</span>
        </a>
      </li>

    </ul>
    
    </div>
        <?= $this->include('dashboard/header'); ?> <!-- Incluye la vista del header -->
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

          <p>
              <a href="<?= base_url('categorias/create'); ?>" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Crear Nueva Categoría
              </a>
          </p>

          <div class="card">
              <div class="card-header">
                  <h5>Lista de Categorías</h5>
              </div>
              <div class="card-body">
                  <?php if (empty($categorias)): ?>
                      <p>No hay categorías para mostrar.</p>
                  <?php else: ?>
                      <div class="table-responsive">
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Nombre</th>
                                      <th>Descripción</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($categorias as $categoria): ?>
                                      <tr>
                                          <td><?= $categoria['id']; ?></td>
                                          <td><?= esc($categoria['nombre']); ?></td>
                                          <td><?= esc($categoria['descripcion']); ?></td>
                                          <td>
                                              <a href="<?= base_url('categorias/edit/' . $categoria['id']); ?>" class="btn btn-sm btn-info" title="Editar">
                                                  <i class="fa fa-pencil"></i>
                                              </a>
                                              <form action="<?= base_url('categorias/delete/' . $categoria['id']); ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');">
                                                  <?= csrf_field(); ?>
                                                  <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                      <i class="fa fa-trash"></i>
                                                  </button>
                                              </form>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div>
                  <?php endif; ?>
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