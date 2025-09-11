<!DOCTYPE html>
<html lang="es">
<head>
    <title>Trending Local - Encuestas y Estudios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PUBLICOS_CSS . '/animate.css') ?>">
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PUBLICOS_CSS . '/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PUBLICOS_CSS . '/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PUBLICOS_CSS . '/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PUBLICOS_CSS . '/bootstrap-datepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PUBLICOS_CSS . '/jquery.timepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PUBLICOS_CSS . '/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PUBLICOS_CSS . '/style.css') ?>">
    <style>
        .causes.causes-2 {
            height: 400px; /* Altura fija para la caja de la publicación */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Distribuye el espacio entre los elementos */
            margin-bottom: 20px;
        }

        .causes-2 .img {
            height: 180px; /* Altura fija para la imagen */
            width: 100%;
            background-size: cover;
            background-position: center;
        }

        .causes-2 .text {
            flex-grow: 1; /* Permite que el contenido de texto ocupe el espacio restante */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Distribuye el espacio entre los elementos del texto */
            padding: 10px; /* Espaciado interno para el texto */
        }

        /* Ajustes para asegurar que el contenido dentro de .text no se desborde */
        .causes-2 .text h2 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .causes-2 .text p {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .causes-2 .btn {
            margin-top: auto; /* Empuja el botón hacia la parte inferior */
        }

        /* Centrar la paginación de CodeIgniter */
        .block-27 ul {
            display: flex;
            justify-content: center; /* Centra los elementos horizontalmente */
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 5px; /* Espacio entre los números */
        }

        .block-27 ul li {
            display: inline-block;
        }


        .block-27 ul li.active span {
            background: #007bff;
            color: #fff;
        }

    </style>
</head>
<body>

    <div class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <p class="mb-0 phone pl-md-2">
                        <a href="tel:+525539656252" class="mr-2"><span class="fa fa-phone mr-1"></span> 55 3965 6252</a> 
                        <a href="mailto:trendinglocalmx@gmail.com"><span class="fa fa-paper-plane mr-1"></span> trendinglocalmx@gmail.com</a>
                    </p>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">Trending Local</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?= base_url('/'); ?>" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="<?= base_url('about'); ?>" class="nav-link">Servicios</a></li>
                    <li class="nav-item active"><a href="<?= base_url('causes'); ?>" class="nav-link">Encuestas y Estudios</a></li>
                    <li class="nav-item"><a href="<?= base_url('contact'); ?>" class="nav-link">Contáctanos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/encuestas.jpeg') ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url() ?>">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Encuestas y Estudios<i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-0 bread">Encuestas y Estudios</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
    <div class="container">
        <div class="row">
            <!-- Verifica si existen publicaciones activas -->
            <?php if (!empty($publicaciones)): ?>
                <!-- Recorre cada publicación y la muestra en un card -->
                <?php foreach ($publicaciones as $publicacion): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="causes causes-2 text-center ftco-animate">
                            <!-- Imagen de la publicación como fondo -->
                            <a href="#" class="img w-100" style="background-image: url(<?= base_url($publicacion['ruta_foto']) ?>);"></a>
                            <div class="text p-2">
                                <!-- Título de la publicación -->
                                <h2><?= esc($publicacion['titulo']) ?></h2>
                                <!-- Categoría de la publicación -->
                                <p>Categoría: <strong><?= esc($publicacion['categoria_nombre']) ?></strong></p>
                                <!-- Fecha de publicación -->
                                <p>Fecha de Publicación: <strong><?= esc(date('d M, Y', strtotime($publicacion['fecha_publicacion']))) ?></strong></p>
                                <p>
                                    <!-- Botón para ver detalle de la publicación -->
                                    <a href="<?= base_url('publicacion/detalle/' . $publicacion['id']) ?>" class="btn btn-light w-100 btn-sm">
                                        Ver resultados
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <!-- Mensaje si no hay publicaciones activas -->
                    <p>No se encontraron publicaciones activas en este momento.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Paginación de publicaciones usando el pager de CodeIgniter -->
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <?= $pager->links('default', 'default_full') ?>
                </div>
            </div>
        </div>
    </div>
</section>


        <?= $this->include('portal/footer'); ?> <!-- Incluye la vista del footer con noticias recientes, enlaces y contacto -->


        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/jquery.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/jquery-migrate-3.0.1.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/popper.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/jquery.easing.1.3.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/jquery.waypoints.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/jquery.stellar.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/jquery.animateNumber.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/jquery.timepicker.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/owl.carousel.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/jquery.magnific-popup.min.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/scrollax.min.js') ?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/google-map.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/main.js') ?>"></script>

</body>
</html>