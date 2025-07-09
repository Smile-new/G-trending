<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?= base_url('recursos_login/style.css') ?>">
    <style>
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-danger { background-color: #f8d7da; color: #721c24; }
        .alert-success { background-color: #d4edda; color: #155724; }
    </style>
</head>

<body>

<section class="breadcumb-area bg-img bg-overlay" style="background-image: url('<?= base_url('recursos_login/img/bg-img/fond.jpg') ?>'); background-size: cover; background-position: center center;">
    <div class="bradcumbContent">
        <p>Bienvenido</p>
        <h2>Iniciar Sesión</h2>
    </div>
</section>

<section class="login-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="login-content">
                    <h3>Bienvenido de nuevo</h3>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('login/authenticate') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="inputUser">Usuario</label>
                            <input type="text" name="user" class="form-control" id="inputUser" placeholder="Introduce tu usuario" value="<?= old('user') ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                        </div>
                        <button type="submit" class="btn oneMusic-btn mt-30">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer-area">
    <div class="container text-center">
       
        <p class="catchy-message">¡Descubre lo mejor de tu comunidad con Trending Local!</p>
        <p class="copywrite-text">&copy; <?= date('Y') ?> Todos los derechos reservados | Este sitio fue creado por Ranker</p>
    </div>
</footer>

<script src="<?= base_url('recursos_login/js/jquery/jquery-2.2.4.min.js') ?>"></script>
<script src="<?= base_url('recursos_login/js/bootstrap/popper.min.js') ?>"></script>
<script src="<?= base_url('recursos_login/js/bootstrap/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('recursos_login/js/plugins/plugins.js') ?>"></script>
<script src="<?= base_url('recursos_login/js/active.js') ?>"></script>
</body>
</html>
