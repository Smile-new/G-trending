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
    <link href="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/simplebar/css/simplebar.css'); ?>" rel="stylesheet"/>
    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/bootstrap.min.css'); ?>" rel="stylesheet"/>
    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/animate.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/icons.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/sidebar-menu.css'); ?>" rel="stylesheet"/>
    <link href="<?= base_url(RECURSOS_ADMIN_CSS . '/app-style.css'); ?>" rel="stylesheet"/>

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        /* Estilos personalizados para la tabla */
        #resultadosTable {
            color: #fff; /* Color de texto predeterminado para toda la tabla */
        }

        #resultadosTable thead th {
            color: #ccc; /* Color para los encabezados de la tabla */
            border-bottom: 1px solid #444;
        }

        #resultadosTable tbody td {
            color: #eee; /* Color para las celdas del cuerpo de la tabla */
            background-color: #2a2a2a; /* Un color de fondo ligeramente más claro para las celdas */
            border-top: 1px solid #444;
        }

        /* Estilo para las filas impares y pares para mayor contraste */
        #resultadosTable tbody tr:nth-child(even) {
            background-color: #333; /* Fondo para filas pares */
        }

        #resultadosTable tbody tr:nth-child(odd) {
            background-color: #2a2a2a; /* Fondo para filas impares */
        }

        /* Quitar el efecto hover si no lo quieres, o definirlo explícitamente */
        #resultadosTable.table-hover tbody tr:hover {
            background-color: #4a4a4a; /* Un color de fondo más claro al pasar el ratón */
            color: #fff; /* Asegura que el texto siga siendo visible al hacer hover */
        }

        /* Estilo para los botones dentro de la tabla */
        #resultadosTable .btn {
            margin-right: 5px;
        }

        /* Estilo para las imágenes dentro de la tabla */
        #resultadosTable img {
            border-radius: 4px; /* Bordes ligeramente redondeados para las imágenes */
            border: 1px solid #555;
        }

        /* Ajustes para el paginador de DataTables */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #eee !important; /* Color del texto de los botones de paginación */
            background-color: #333 !important;
            border: 1px solid #555 !important;
            margin: 0 5px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
            background-color: #007bff !important; /* Color primario para el botón activo */
            border-color: #007bff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #555 !important;
            color: #fff !important;
        }

        /* Estilo para los controles de búsqueda y entradas por página de DataTables */
        .dataTables_wrapper .dataTables_filter label,
        .dataTables_wrapper .dataTables_length label {
            color: #eee;
        }

        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
            padding: 5px;
            border-radius: 4px;
        }

        /* Información de "Showing X to Y of Z entries" */
        .dataTables_wrapper .dataTables_info {
            color: #eee;
        }
    </style>

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

            <li class="active">
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $page_title; ?></h5>
                            <hr>

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

                            <div class="text-right mb-3">
                                <a href="<?= base_url('resultado/create'); ?>" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Crear Nuevo Resultado
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table id="resultadosTable" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>Fecha Publicación</th>
                                        <th>Categoría</th>
                                        <th>Autor</th>
                                        <th>Imagen</th>
                                        <th>PDF</th>
                                        <th>Activo</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($publicaciones) && is_array($publicaciones)): ?>
                                        <?php foreach ($publicaciones as $publicacion): ?>
                                            <tr>
                                                <td><?= esc($publicacion['id']); ?></td>
                                                <td>
                                                    <?php
                                                    $fullTitle = esc($publicacion['titulo']);
                                                    $truncatedTitle = substr($fullTitle, 0, 50); // Adjust length as needed
                                                    echo "En esta noticia podrás ver: " . $truncatedTitle . (strlen($fullTitle) > 50 ? '...' : '');
                                                    ?>
                                                </td>
                                                <td><?= esc(substr($publicacion['descripcion'], 0, 100)); ?><?= (strlen($publicacion['descripcion']) > 100) ? '...' : ''; ?></td>
                                                <td><?= esc($publicacion['fecha_publicacion']); ?></td>
                                                <td><?= esc($publicacion['categoria_nombre']); ?></td>
                                                <td><?= esc($publicacion['usuario_nombre']); ?></td>
                                                <td>
                                                    <?php if (!empty($publicacion['ruta_foto'])): ?>
                                                        <img src="<?= base_url($publicacion['ruta_foto']); ?>" alt="Imagen"
                                                             style="width: 50px; height: 50px; object-fit: cover;">
                                                    <?php else: ?>
                                                        No hay imagen
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if (!empty($publicacion['ruta_pdf'])): ?>
                                                        <a href="<?= base_url($publicacion['ruta_pdf']); ?>" target="_blank"
                                                           class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i> Ver PDF</a>
                                                    <?php else: ?>
                                                        No hay PDF
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= $publicacion['activo'] ? '<span class="badge badge-success">Sí</span>' : '<span class="badge badge-danger">No</span>'; ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="<?= base_url('resultado/edit/' . esc($publicacion['id'])); ?>"
                                                           class="btn btn-warning btn-sm" title="Editar"><i class="fa fa-pencil"></i></a>

                                                        <?php if ($publicacion['activo']): ?>
                                                            <a href="<?= base_url('resultado/toggleStatus/' . esc($publicacion['id'])); ?>"
                                                               class="btn btn-danger btn-sm" title="Desactivar"
                                                               onclick="return confirm('¿Estás seguro de que quieres desactivar este resultado?');">
                                                                <i class="fa fa-ban"></i> Desactivar
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?= base_url('resultado/toggleStatus/' . esc($publicacion['id'])); ?>"
                                                               class="btn btn-success btn-sm" title="Activar"
                                                               onclick="return confirm('¿Estás seguro de que quieres activar este resultado?');">
                                                                <i class="fa fa-check"></i> Activar
                                                            </a>
                                                        <?php endif; ?>

                                                        <a href="<?= base_url('resultado/delete/' . esc($publicacion['id'])); ?>"
                                                           class="btn btn-danger btn-sm" title="Eliminar"
                                                           onclick="return confirm('¿Estás seguro de que quieres eliminar este resultado?');"><i
                                                                    class="fa fa-trash-o"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">No hay resultados disponibles.</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="overlay toggle-menu"></div>
            </div>
        </div>
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
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

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function () {
        $('#resultadosTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            "responsive": true,
            "columnDefs": [
                { "responsivePriority": 1, "targets": 0 }, // ID
                { "responsivePriority": 2, "targets": 1 }, // Título
                { "responsivePriority": 3, "targets": -1 },// Acciones (última columna)
                { "responsivePriority": 4, "targets": 6 }, // Imagen (columna 6)
                { "responsivePriority": 5, "targets": 7 }, // PDF (columna 7)
                { "responsivePriority": 6, "targets": 3 }, // Fecha Publicación (columna 3)
                { "responsivePriority": 7, "targets": 4 }, // Categoría (columna 4)
                { "responsivePriority": 8, "targets": 5 }, // Autor (columna 5)
                { "responsivePriority": 9, "targets": 8 }, // Activo (columna 8)
                { "responsivePriority": 10, "targets": 2 }  // Descripción (columna 2 - se oculta primero)
            ]
        });

        // Cerrar alertas flashdata
        $('.alert .close').on('click', function() {
            $(this).closest('.alert').alert('close');
        });
    });
</script>

</body>
</html>