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

          <p>
              <a href="<?= base_url('users/create'); ?>" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Crear Nuevo Usuario
              </a>
          </p>

          <div class="card">
              <div class="card-header">
                  <h5>Lista de Usuarios</h5>
              </div>
              <div class="card-body">
                  <?php if (empty($usuarios)): ?>
                      <p>No hay usuarios para mostrar.</p>
                  <?php else: ?>
                      <div class="table-responsive">
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Foto</th>
                                      <th>Nombre de Usuario</th>
                                      <th>Email (User)</th>
                                      <th>Rol</th>
                                      <th>Activo</th>
                                      <th>Fecha Creación</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($usuarios as $usuario): ?>
                                      <tr>
                                          <td><?= $usuario['id']; ?></td>
                                          <td>
                                              <?php
                                                  // Determina la ruta de la imagen de perfil
                                                  // Si $usuario['foto'] existe y no está vacío, úsala.
                                                  // De lo contrario, usa una imagen por defecto.
                                                  $profilePicture = !empty($usuario['foto'])
                                                      ? base_url('img_user/' . $usuario['foto']) // Asume que 'img_user' es la carpeta donde se guardan las fotos
                                                      : base_url('assets/images/user/avatar-2.jpg'); // Imagen por defecto
                                              ?>
                                              <img src="<?= $profilePicture; ?>" alt="Foto de Usuario" class="w-10 h-10 rounded-full object-cover" style="width: 40px; height: 40px; border-radius: 50%;">
                                          </td>
                                          <td><?= esc($usuario['nombre_usuario']); ?></td>
                                          <td><?= esc($usuario['user']); ?></td>
                                          <td>
                                              <?php
                                                  // Buscar el nombre del rol
                                                  $rolNombre = 'Desconocido';
                                                  foreach ($roles as $rol) {
                                                      if ($rol['id'] == $usuario['rol_id']) {
                                                          $rolNombre = esc($rol['nombre_rol']);
                                                          break;
                                                      }
                                                  }
                                                  echo $rolNombre;
                                              ?>
                                          </td>
                                          <td>
                                              <form action="<?= base_url('users/toggleStatus/' . $usuario['id']); ?>" method="post" style="display:inline;">
                                                  <?= csrf_field(); ?>
                                                  <button type="submit" class="btn btn-sm <?= $usuario['activo'] ? 'btn-success' : 'btn-warning'; ?>"
                                                          title="<?= $usuario['activo'] ? 'Desactivar' : 'Activar'; ?> usuario">
                                                      <?= $usuario['activo'] ? 'Activo' : 'Inactivo'; ?>
                                                  </button>
                                              </form>
                                          </td>
                                          <td><?= $usuario['fecha_creacion']; ?></td>
                                          <td>
                                              <a href="<?= base_url('users/edit/' . $usuario['id']); ?>" class="btn btn-sm btn-info" title="Editar">
                                                  <i class="fa fa-edit"></i>
                                              </a>
                                              <a href="<?= base_url('users/delete/' . $usuario['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');" title="Eliminar">
                                                  <i class="fa fa-trash-o"></i>
                                              </a>
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