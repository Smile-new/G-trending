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
                        <i class="fa fa-envelope-open-o"></i>
                    </a>
                </li>
                <li class="nav-item dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                        <i class="fa fa-bell-o"></i>
                    </a>
                </li>
                <li class="nav-item language">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                        <i class="fa fa-flag"></i>
                    </a>
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
                    <?php if (isset($validation) && $validation->getErrors()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($validation->getErrors() as $error): ?>
                                    <li><?= esc($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-header">
                            <h5>Formulario de Edición de Usuario</h5>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('users/update/' . esc($usuario['id'])); ?>
                                <?= csrf_field(); ?>

                                <div class="form-group">
                                    <label for="nombre_usuario">Nombre Completo</label>
                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                                                value="<?= old('nombre_usuario', $usuario['nombre_usuario']); ?>" required>
                                    <?php if (isset($validation) && $validation->hasError('nombre_usuario')): ?>
                                        <div class="text-danger"><?= $validation->getError('nombre_usuario'); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="user">Usuario (para iniciar sesión)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="user" name="user"
                                                value="<?= old('user', $usuario['user']); ?>" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" id="generateUsernameBtn">Generar</button>
                                        </div>
                                    </div>
                                    <?php if (isset($validation) && $validation->hasError('user')): ?>
                                        <div class="text-danger"><?= $validation->getError('user'); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="password">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" id="generatePasswordBtn">Generar</button>
                                            <button type="button" class="btn btn-outline-secondary" id="togglePasswordBtn">Mostrar</button>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Si no ingresas una nueva contraseña, la actual se mantendrá.</small>
                                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                                        <div class="text-danger"><?= $validation->getError('password'); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="rol_id">Rol</label>
                                    <select class="form-control" id="rol_id" name="rol_id" required>
                                        <option value="">Selecciona un rol</option>
                                        <?php foreach ($roles as $rol): ?>
                                            <option value="<?= esc($rol['id']); ?>"
                                                    <?= (old('rol_id', $usuario['rol_id']) == $rol['id']) ? 'selected' : ''; ?>>
                                                <?= esc($rol['nombre_rol']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($validation) && $validation->hasError('rol_id')): ?>
                                        <div class="text-danger"><?= $validation->getError('rol_id'); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Foto de Perfil Actual</label>
                                    <div class="mb-2" id="previewContainer">
                                        <?php
                                            $profilePicture = !empty($usuario['foto']) && $usuario['foto'] !== 'default.png'
                                                ? base_url('img_user/' . $usuario['foto'])
                                                : base_url('assets/images/user/avatar-2.jpg'); // Default image
                                        ?>
                                        <img src="<?= $profilePicture; ?>" alt="Foto de Perfil Actual" class="img-thumbnail" style="max-width: 150px; max-height: 150px;" id="imagePreview">
                                        <input type="hidden" name="current_image" value="<?= esc($usuario['foto']); ?>">
                                    </div>
                                    <?php if (!empty($usuario['foto']) && $usuario['foto'] !== 'default.png'): ?>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="remove_photo" name="remove_photo" value="1">
                                            <label class="form-check-label" for="remove_photo">Eliminar foto actual</label>
                                        </div>
                                    <?php endif; ?>
                                    <label for="imagen_perfil">Subir Nueva Foto de Perfil (opcional)</label>
                                    <input type="file" class="form-control-file" id="imagen_perfil" name="imagen_perfil">
                                    <?php if (isset($validation) && $validation->hasError('imagen_perfil')): ?>
                                        <div class="text-danger"><?= $validation->getError('imagen_perfil'); ?></div>
                                    <?php endif; ?>
                                    <small class="form-text text-muted">Archivos permitidos: JPG, JPEG, PNG, GIF. Tamaño máximo: 1MB.</small>
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1"
                                                <?= (old('activo', $usuario['activo']) == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="activo">Activo</label>
                                    <?php if (isset($validation) && $validation->hasError('activo')): ?>
                                        <div class="text-danger"><?= $validation->getError('activo'); ?></div>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                                <a href="<?= base_url('users'); ?>" class="btn btn-secondary">Cancelar</a>
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
                Copyright © 2018 Dashtreme Admin
            </div>
        </div>
    </footer>
    <div class="right-sidebar">
        <div class="switcher-icon">
            <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
        </div>
        <div class="right-sidebar-content">

            <p class="mb-0">Gaussion Texture</p>
            <hr>

            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>

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

<script src='<?= base_url(RECURSOS_ADMIN_PLUGINS . '/fullcalendar/js/moment.min.js'); ?>'></script>
<script src='<?= base_url(RECURSOS_ADMIN_PLUGINS . '/fullcalendar/js/fullcalendar.min.js'); ?>'></script>
<script src="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/fullcalendar/js/fullcalendar-custom-script.js'); ?>"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const generateUsernameBtn = document.getElementById('generateUsernameBtn');
    const userInput = document.getElementById('user'); // Este es el campo 'user' (usuario/username)

    const generatePasswordBtn = document.getElementById('generatePasswordBtn');
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');

    const imagenPerfilInput = document.getElementById('imagen_perfil');
    const imagePreview = document.getElementById('imagePreview');
    const previewContainer = document.getElementById('previewContainer');

    // Función para generar un nuevo usuario (username) via AJAX
    if (generateUsernameBtn) {
        generateUsernameBtn.addEventListener('click', function() {
            // Usar la ruta con el nombre correcto que configuramos en app/Config/Routes.php
            fetch('<?= route_to('admin_generate_username_ajax') ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.username) {
                        userInput.value = data.username;
                    } else {
                        alert('Error al generar el usuario.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error de red al generar el usuario.');
                });
        });
    }

    // Función para generar una nueva contraseña via AJAX
    if (generatePasswordBtn) {
        generatePasswordBtn.addEventListener('click', function() {
            // Usar la ruta con el nombre correcto que configuramos en app/Config/Routes.php
            fetch('<?= route_to('admin_generate_password_ajax') ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.password) {
                        passwordInput.value = data.password;
                        passwordInput.type = 'text'; // Asegurar que sea de tipo 'text' para que se vea
                        togglePasswordBtn.textContent = 'Ocultar'; // Cambiar texto del botón
                    } else {
                        alert('Error al generar contraseña.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error de red al generar contraseña.');
                });
        });
    }

    // Función para mostrar/ocultar contraseña
    if (togglePasswordBtn) {
        togglePasswordBtn.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordBtn.textContent = 'Ocultar';
            } else {
                passwordInput.type = 'password';
                togglePasswordBtn.textContent = 'Mostrar';
            }
        });
    }

    // Previsualización de la imagen de perfil al seleccionar un archivo
    if (imagenPerfilInput) {
        imagenPerfilInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    previewContainer.style.display = 'block';
                    imagePreview.style.display = 'block'; // Asegurarse de que la imagen se muestre
                };
                reader.readAsDataURL(file);
            } else {
                // Si no se selecciona un archivo, mantener la imagen actual o ocultar si no hay ninguna
                const currentImage = document.querySelector('input[name="current_image"]').value;
                if (currentImage && currentImage !== 'default.png') { // Only display if there's a non-default current image
                    imagePreview.src = '<?= base_url('img_user/') ?>' + currentImage;
                    previewContainer.style.display = 'block';
                    imagePreview.style.display = 'block';
                } else {
                    imagePreview.src = '<?= base_url('assets/images/user/avatar-2.jpg'); ?>'; // Show default if no image
                    previewContainer.style.display = 'block';
                    imagePreview.style.display = 'block';
                }
            }
        });
    }

    // Asegurarse de que la imagen actual se muestre al cargar la página si existe
    // y que la previsualización se oculte si no hay imagen (nueva o existente)
    // También manejar el caso cuando se devuelve old() data de una imagen que no se pudo cargar.
    const initialCurrentSrc = document.querySelector('input[name="current_image"]').value;
    // old('imagen_perfil') for file inputs doesn't contain the actual file path, just the file name.
    // So, we cannot re-preview a previously uploaded 'old' file directly from old('imagen_perfil').
    // The best approach is to display the *currently saved* image or the default, and let the user re-upload if needed.
    
    if (initialCurrentSrc && initialCurrentSrc !== 'default.png') {
        imagePreview.src = '<?= base_url('img_user/') ?>' + initialCurrentSrc;
        previewContainer.style.display = 'block';
        imagePreview.style.display = 'block';
    } else {
        // If no specific user image, show the default avatar
        imagePreview.src = '<?= base_url('assets/images/user/avatar-2.jpg'); ?>';
        previewContainer.style.display = 'block';
        imagePreview.style.display = 'block';
    }
});
</script>
</body>
</html>