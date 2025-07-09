<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
  <head>
    <title><?= $page_title; ?> | Monitor Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able is trending dashboard template made using Bootstrap 5 design framework. Datta Able is available in Bootstrap, React, CodeIgniter, Angular, and .net Technologies." />
    <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="CodedThemes" />

    <link rel="icon" href="<?= base_url(RECURSOS_ADMIN_IMAGES . '/favicon.svg'); ?>" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_FONTS . '/phosphor/duotone/style.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_FONTS . '/tabler-icons.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_FONTS . '/feather.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_FONTS . '/fontawesome.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_FONTS . '/material.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_CSS . '/style.css'); ?>" id="main-style-link" />

  </head>
  <body>
    <div class="loader-bg fixed inset-0 bg-white dark:bg-themedark-cardbg z-[1034]">
        <div class="loader-track h-[5px] w-full inline-block absolute overflow-hidden top-0">
            <div class="loader-fill w-[300px] h-[5px] bg-primary-500 absolute top-0 left-0 animate-[hitZak_0.6s_ease-in-out_infinite_alternate]"></div>
        </div>
    </div>
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header flex items-center py-4 px-6 h-header-height">
                <a href="<?= base_url('dashboard/index'); ?>" class="b-brand flex items-center gap-3">
                    <img src="<?= base_url(RECURSOS_ADMIN_IMAGES . '/logo-white.svg'); ?>" class="img-fluid logo logo-lg" alt="logo" />
                    <img src="<?= base_url(RECURSOS_ADMIN_IMAGES . '/favicon.svg'); ?>" class="img-fluid logo logo-sm" alt="logo" />
                </a>
            </div>
            <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="pc-item">
                        <a href="<?= base_url('dashboard'); ?>" class="pc-link">
                            <span class="pc-micon">
                                <i data-feather="home"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption">
                        <label>UI Components</label>
                        <i data-feather="feather"></i>
                    </li>
                
                    <li class="pc-item pc-hasmenu">
                        <a href="<?= base_url('icon'); ?>" class="pc-link">
                            <span class="pc-micon"> <i data-feather="feather"></i></span>
                            <span class="pc-mtext">Icons</span>
                        </a>
                    </li>

                    <li class="pc-item pc-hasmenu">
                        <a href="<?= base_url('users'); ?>" class="pc-link"> <span class="pc-micon"> <i data-feather="user-plus"></i></span>
                            <span class="pc-mtext">Usuarios</span> </a>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="<?= base_url('publicacion'); ?>" class="pc-link"> <span class="pc-micon"> <i data-feather="book"></i></span>
                            <span class="pc-mtext">Publicaciones</span> </a>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="<?= base_url('categorias'); ?>" class="pc-link"> <span class="pc-micon"> <i data-feather="grid"></i></span>
                            <span class="pc-mtext">Categorías</span> </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="pc-header">
        <div class="header-wrapper flex max-sm:px-[15px] px-[25px] grow">
            <div class="me-auto pc-mob-drp">
                <ul class="inline-flex *:min-h-header-height *:inline-flex *:items-center">
                    <li class="pc-h-item pc-sidebar-collapse max-lg:hidden lg:inline-flex">
                        <a href="#" class="pc-head-link ltr:!ml-0 rtl:!mr-0" id="sidebar-hide">
                            <i data-feather="menu"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup lg:hidden">
                        <a href="#" class="pc-head-link ltr:!ml-0 rtl:!mr-0" id="mobile-collapse">
                            <i data-feather="menu"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle me-0" data-pc-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i data-feather="search"></i>
                        </a>
                        <div class="dropdown-menu pc-h-dropdown drp-search">
                            <form class="px-2 py-1">
                                <input type="search" class="form-control !border-0 !shadow-none" placeholder="Search here. . ." />
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                <ul class="inline-flex *:min-h-header-height *:inline-flex *:items-center">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle me-0" data-pc-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i data-feather="sun"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                            <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
                                <i data-feather="moon"></i>
                                <span>Dark</span>
                            </a>
                            <a href="#!" class="dropdown-item" onclick="layout_change('light')">
                                <i data-feather="sun"></i>
                                <span>Light</span>
                            </a>
                            <a href="#!" class="dropdown-item" onclick="layout_change_default()">
                                <i data-feather="settings"></i>
                                <span>Default</span>
                            </a>
                        </div>
                    </li>
                    
                    
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-pc-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-pc-auto-close="outside" aria-expanded="false">
                            <i data-feather="user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown p-2 overflow-hidden">
                            <div class="dropdown-header flex items-center justify-between py-4 px-5 bg-primary-500">
                                <div class="flex mb-1 items-center">
                                    <div class="shrink-0">
                                        <img src="<?= base_url(RECURSOS_ADMIN_IMAGES . '/user/avatar-2.jpg'); ?>" alt="user-image" class="w-10 rounded-full" />
                                    </div>
                                    <div class="grow ms-3">
                                        <h6 class="mb-1 text-white">Carson Darrin 🖖</h6>
                                        <span class="text-white">carson.darrin@company.io</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-body py-4 px-5">
                                <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                    <a href="#" class="dropdown-item">
                                        <span>
                                            <svg class="pc-icon text-muted me-2 inline-block">
                                                <use xlink:href="#custom-setting-outline"></use>
                                            </svg>
                                            <span>Settings</span>
                                        </span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <span>
                                            <svg class="pc-icon text-muted me-2 inline-block">
                                                <use xlink:href="#custom-share-bold"></use>
                                            </svg>
                                            <span>Share</span>
                                        </span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <span>
                                            <svg class="pc-icon text-muted me-2 inline-block">
                                                <use xlink:href="#custom-lock-outline"></use>
                                            </svg>
                                            <span>Change Password</span>
                                        </span>
                                    </a>
                                    <div class="grid my-3">
                                        <button class="btn btn-primary flex items-center justify-center">
                                            <svg class="pc-icon me-2 w-[22px] h-[22px]">
                                                <use xlink:href="#custom-logout-1-outline"></use>
                                            </svg>
                                            Logout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="pc-container">
        <div class="pc-content">
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
                            <h5>Editar Categoría</h5>
                        </div>
                        <div class="card-body">
                            <?= form_open('categorias/update/' . $categoria['id']); ?>
                                <?= csrf_field(); ?>

                                <div class="form-group mb-3">
                                    <label for="nombre" class="form-label">Nombre de la Categoría</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= old('nombre', $categoria['nombre'] ?? ''); ?>" required>
                                    <?php if (isset($validation) && $validation->hasError('nombre')): ?>
                                        <div class="text-danger"><?= $validation->getError('nombre'); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= old('descripcion', $categoria['descripcion'] ?? ''); ?></textarea>
                                    <?php if (isset($validation) && $validation->hasError('descripcion')): ?>
                                        <div class="text-danger"><?= $validation->getError('descripcion'); ?></div>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <a href="<?= base_url('categorias'); ?>" class="btn btn-secondary">Cancelar</a>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="pc-footer">
      <div class="footer-wrapper container-fluid mx-10">
        <div class="grid grid-cols-12 gap-1.5">
          <div class="col-span-12 sm:col-span-6 my-1">
            <p class="m-0"></p>
              <a href="https://codedthemes.com/" class="text-theme-bodycolor dark:text-themedark-bodycolor hover:text-primary-500 dark:hover:text-primary-500" target="_blank">CodedThemes</a>
              , Built with ♥ for a smoother web presence.
            </p>
          </div>
          <div class="col-span-12 sm:col-span-6 my-1 justify-self-end">
               <p class="inline-block max-sm:mr-3 sm:ml-2">Distributed by <a href="https://themewagon.com" target="_blank">Themewagon</a></p>
          </div>
        </div>
      </div>
    </footer>
 
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/plugins/simplebar.min.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/plugins/popper.min.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/icon/custom-icon.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/plugins/feather.min.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/component.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/theme.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/script.js'); ?>"></script>

    <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]">
    </div>

    
    <script>
      layout_change('false');
    </script>
      
    
    <script>
      layout_theme_sidebar_change('dark');
    </script>
    
      
    <script>
      change_box_container('false');
    </script>
      
    <script>
      layout_caption_change('true');
    </script>
      
    <script>
      layout_rtl_change('false');
    </script>
      
    <script>
      preset_change('preset-1');
    </script>
      
    <script>
      main_layout_change('vertical');
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            feather.replace(); // Esto busca todos los elementos con data-feather y los reemplaza con los SVG de iconos
        });
    </script>

  </body>
</html>