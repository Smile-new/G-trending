<?php 
$session = session();
$username = $session->get('username'); 
$foto = $session->get('foto');
$role_name = $session->get('role_name');
?>

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
          <input type="text" class="form-control" placeholder="Buscar...">
          <a href="javascript:void();"><i class="icon-magnifier"></i></a>
        </form>
      </li>
    </ul>
        
    <ul class="navbar-nav align-items-center right-nav-link">
      <li class="nav-item">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
          <span class="user-profile">
            <img src="<?= !empty($foto) ? base_url('img_user/' . esc($foto)) : base_url('assets/images/user/avatar-2.jpg') ?>" 
                 class="img-circle" alt="user avatar">
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item user-details">
            <a href="javascript:void();">
              <div class="media">
                <div class="avatar">
                  <img class="align-self-start mr-3" src="<?= !empty($foto) ? base_url('img_user/' . esc($foto)) : base_url('assets/images/user/avatar-2.jpg') ?>" alt="user avatar">
                </div>
                <div class="media-body">
                  <h6 class="mt-2 user-title"><?= esc($username) ?></h6>
                  <p class="user-subtitle"><?= esc($role_name) ?></p>
                </div>
              </div>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item">
            <a href="<?= base_url('logout') ?>" style="color: white; text-decoration: none;">
              <i class="icon-power mr-2"></i>Cerrar Sesión
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>
