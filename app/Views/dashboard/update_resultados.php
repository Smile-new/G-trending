<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="Interfaz de edición de resultados con editor de texto enriquecido."/>
    <title><?= esc($page_title); ?> | Dashtreme Admin</title>

    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/pace.min.css'); ?>" rel="stylesheet"/>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/pace.min.js'); ?>"></script>

    <link rel="icon" href="<?= base_url('assets/images/favicon.ico'); ?>" type="image/x-icon">

    <link href="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/simplebar/css/simplebar.css'); ?>" rel="stylesheet"/>

    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/bootstrap.min.css'); ?>" rel="stylesheet"/>

    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/animate.css'); ?>" rel="stylesheet" type="text/css"/>

    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/icons.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/sidebar-menu.css'); ?>" rel="stylesheet"/>

    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/app-style.css'); ?>" rel="stylesheet"/>

</head>

<body class="bg-theme">

    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <div id="wrapper">

        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="<?= base_url('dashboard/index'); ?>">
                    <img src="<?= base_url('assets/images/logo-icon.png'); ?>" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Dashtreme Admin</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">NAVEGACIÓN PRINCIPAL</li>
                <li>
                    <a href="<?= base_url('dashboard'); ?>">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('forms'); ?>">
                        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Formularios (Ejemplo)</span>
                    </a>
                </li>

                <li class="active"> <a href="<?= base_url('resultado'); ?>">
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
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                           href="javascript:void();">
                            <i class="fa fa-envelope-open-o"></i></a>
                    </li>
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                           href="javascript:void();">
                            <i class="fa fa-bell-o"></i></a>
                    </li>
                    <li class="nav-item language">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                           href="javascript:void();"><i class="fa fa-flag"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><i class="flag-icon flag-icon-gb mr-2"></i> English</li>
                            <li class="dropdown-item"><i class="flag-icon flag-icon-fr mr-2"></i> French</li>
                            <li class="dropdown-item"><i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
                            <li class="dropdown-item"><i class="flag-icon flag-icon-de mr-2"></i> German</li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle"
                                                             alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3"
                                                                 src="https://via.placeholder.com/110x110"
                                                                 alt="user avatar"></div>
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
                            <li class="dropdown-item"><i class="icon-power mr-2"></i> <a href="<?= base_url('logout'); ?>">Logout</a></li>
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
                        <h1><?= esc($page_title); ?></h1>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php
                        // Check for 'errors' from validation (if validation fails)
                        $errors = session()->getFlashdata('errors');
                        if (isset($errors) && !empty($errors)): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= esc($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="card">
                            <div class="card-header">
                                <h5>Formulario de Edición de Resultado</h5>
                            </div>
                            <div class="card-body">
                                <?= form_open_multipart('resultado/update/' . esc($publicacion['id'])); ?>
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                           value="<?= old('titulo', $publicacion['titulo']); ?>" required>
                                    <?php if (isset($errors['titulo'])): ?>
                                        <div class="text-danger"><?= $errors['titulo']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" id="editor" name="descripcion" rows="5"><?= old('descripcion', $publicacion['descripcion']); ?></textarea>
                                    <?php if (isset($errors['descripcion'])): ?>
                                        <div class="text-danger"><?= $errors['descripcion']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="fecha_publicacion">Fecha de Publicación</label>
                                    <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion"
                                           value="<?= old('fecha_publicacion', $publicacion['fecha_publicacion']); ?>" required>
                                    <?php if (isset($errors['fecha_publicacion'])): ?>
                                        <div class="text-danger"><?= $errors['fecha_publicacion']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Imagen Actual</label>
                                    <div class="mb-2">
                                        <?php if (!empty($publicacion['ruta_foto'])): ?>
                                            <img src="<?= base_url($publicacion['ruta_foto']); ?>" alt="Imagen Actual" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="remove_ruta_foto" name="remove_ruta_foto" value="1">
                                                <label class="form-check-label" for="remove_ruta_foto">Eliminar imagen actual</label>
                                            </div>
                                        <?php else: ?>
                                            <p>No hay imagen actual.</p>
                                        <?php endif; ?>
                                    </div>
                                    <label for="ruta_foto">Subir Nueva Imagen (opcional)</label>
                                    <input type="file" class="form-control-file" id="ruta_foto" name="ruta_foto"> <?php if (isset($errors['ruta_foto'])): ?>
                                        <div class="text-danger"><?= $errors['ruta_foto']; ?></div>
                                    <?php endif; ?>
                                    <small class="form-text text-muted">Archivos permitidos: JPG, JPEG, PNG, WEBP. Tamaño máximo: 2MB.</small>
                                </div>

                                <div class="form-group">
                                    <label>Archivo PDF Actual</label>
                                    <div class="mb-2">
                                        <?php if (!empty($publicacion['ruta_pdf'])): ?>
                                            <a href="<?= base_url($publicacion['ruta_pdf']); ?>" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i> Ver PDF Actual</a>
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="remove_ruta_pdf" name="remove_ruta_pdf" value="1">
                                                <label class="form-check-label" for="remove_ruta_pdf">Eliminar PDF actual</label>
                                            </div>
                                        <?php else: ?>
                                            <p>No hay archivo PDF actual.</p>
                                        <?php endif; ?>
                                    </div>
                                    <label for="ruta_pdf">Subir Nuevo PDF (opcional)</label>
                                    <input type="file" class="form-control-file" id="ruta_pdf" name="ruta_pdf"> <?php if (isset($errors['ruta_pdf'])): ?>
                                        <div class="text-danger"><?= $errors['ruta_pdf']; ?></div>
                                    <?php endif; ?>
                                    <small class="form-text text-muted">Archivos permitidos: PDF. Tamaño máximo: 5MB.</small>
                                </div>

                                <div class="form-group">
                                    <label for="categoria_id">Categoría</label>
                                    <select class="form-control" id="categoria_id" name="categoria_id" required>
                                        <option value="">Selecciona una categoría</option>
                                        <?php foreach ($categorias as $categoria): ?>
                                            <option value="<?= esc($categoria['id']); ?>"
                                                    <?= (old('categoria_id', $publicacion['categoria_id']) == $categoria['id']) ? 'selected' : ''; ?>>
                                                <?= esc($categoria['nombre']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['categoria_id'])): ?>
                                        <div class="text-danger"><?= $errors['categoria_id']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <input type="hidden" name="usuario_id" value="<?= esc(session()->get('id')); ?>">
                                <?php if (isset($errors['usuario_id'])): ?>
                                    <div class="text-danger"><?= $errors['usuario_id']; ?></div>
                                <?php endif; ?>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1"
                                           <?= (old('activo', $publicacion['activo']) == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="activo">Activo</label>
                                    <?php if (isset($errors['activo'])): ?>
                                        <div class="text-danger"><?= $errors['activo']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Actualizar Resultado</button>
                                <a href="<?= base_url('resultado'); ?>" class="btn btn-secondary">Cancelar</a>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overlay toggle-menu"></div>
            </div>
        </div>
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <footer class="footer">
            <div class="container">
                <div class="text-center">
                    Copyright © <?= date('Y'); ?> Tu Empresa/Sitio
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
    </div>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/jquery.min.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/popper.min.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/bootstrap.min.js'); ?>"></script>

    <script src="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/simplebar/js/simplebar.js'); ?>"></script>
    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/sidebar-menu.js'); ?>"></script>

    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/app-script.js'); ?>"></script>

    <script src="<?= base_url(RECURSOS_ADMIN_JS . '/ckeditor.js'); ?>"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                // Aquí puedes personalizar la configuración de tu editor CKEditor 5
                // Por ejemplo, para simplificar la barra de herramientas:
                // toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                // Para quitar el botón de carga de imágenes (si las manejas aparte):
                // removePlugins: ['ImageUpload', 'EasyImage', 'CKFinder'],
            } )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

</body>
</html>