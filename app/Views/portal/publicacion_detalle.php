<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trending Local - Detalle de Publicación</title>
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
        .blog-description {
            text-align: justify;
        }
        .post-title { /* New class for the title */
            text-align: justify;
            font-weight: bold;
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
                   <li class="nav-item"><a href="<?= base_url('/'); ?>" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="<?= base_url('about'); ?>" class="nav-link">About</a></li>
                    <li class="nav-item active"><a href="<?= base_url('causes'); ?>" class="nav-link">Causes</a></li>
                    <li class="nav-item"><a href="<?= base_url('contact'); ?>" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/5.jpg') ?>'); text-align: center;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url() ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="<?= base_url('causes'); ?>">Publicaciones <i class="ion-ios-arrow-forward"></i></a></span> <span>Detalle <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-0 bread">Detalle de Publicación</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate py-md-5">
                <?php if (isset($publicacion) && $publicacion): ?>
                    <h2 class="mb-3 ftco-animate post-title"><?= esc($publicacion['titulo']) ?></h2>
                    <p class="mb-4 ftco-animate">
                        <?php if (!empty($publicacion['ruta_foto'])): ?>
                            <img src="<?= base_url($publicacion['ruta_foto']) ?>" alt="<?= esc($publicacion['titulo']) ?>" class="img-fluid" style="width: 100%; max-height: 500px; object-fit: cover;">
                        <?php else: ?>
                            <img src="<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/placeholder.jpg') ?>" alt="No hay imagen" class="img-fluid" style="width: 100%; max-height: 500px; object-fit: cover;">
                        <?php endif; ?>
                    </p>
                    <p class="meta-info ftco-animate">
                        <span class="mr-3"><i class="fa fa-tag mr-1"></i> Categoría: <a href="#"><?= esc($publicacion['categoria_nombre']) ?></a></span>
                        <span class="mr-3"><i class="fa fa-calendar mr-1"></i> Publicado: <?= date('d M, Y', strtotime(esc($publicacion['fecha_publicacion']))) ?></span>
                    </p>
                    <div class="blog-text mt-4 ftco-animate">
                        <div class="blog-description"><?= $publicacion['descripcion'] ?></div>

                        <?php if (!empty($publicacion['ruta_pdf'])): ?>
                            <p class="mt-5 ftco-animate">
                                <a href="<?= base_url($publicacion['ruta_pdf']) ?>" target="_blank" class="btn btn-primary py-3 px-5">
                                    <span class="fa fa-file-pdf-o mr-2"></span> Ver Resultados Detallados (PDF)
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="py-5 text-center">
                        <h2 class="mb-3">Publicación no encontrada</h2>
                        <p>Lo sentimos, la publicación que buscas no existe o ya no está disponible.</p>
                        <p><a href="<?= base_url('causes'); ?>" class="btn btn-primary py-3 px-5 mt-4">Volver a Publicaciones</a></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-4 sidebar ftco-animate py-md-5">
                <div class="sidebar-box ftco-animate">
                    <h3>Publicaciones Recientes</h3>

                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/image_1.jpg') ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Título de Publicación Reciente 1</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="fa fa-calendar"></span> Jul 10, 2025</a></div>
                                <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/image_2.jpg') ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Título de Publicación Reciente 2</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="fa fa-calendar"></span> Jul 05, 2025</a></div>
                                <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/image_3.jpg') ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Título de Publicación Reciente 3</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="fa fa-calendar"></span> Jun 28, 2025</a></div>
                                <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Trending Local.</h2>
                    <p>Conéctate con lo local. Noticias, eventos y servicios en tu comunidad.</p>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="LinkedIn"><span class="fa fa-linkedin"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Últimas Noticias</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="img mr-4 rounded" style="background-image: url(<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/image_1.jpg') ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Explora eventos y oportunidades en tu área.</a></h3>
                            <div class="meta">
                                <div><a href="#">Jul 17, 2025</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#">5</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="img mr-4 rounded" style="background-image: url(<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/image_2.jpg') ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Apoya a los negocios y talentos locales.</a></h3>
                            <div class="meta">
                                <div><a href="#">Jul 17, 2025</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#">3</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                    <h2 class="footer-heading">Enlaces Rápidos</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('/'); ?>" class="py-2 d-block">Inicio</a></li>
                        <li><a href="<?= base_url('about'); ?>" class="py-2 d-block">Nosotros</a></li>
                        <li><a href="<?= base_url('causes'); ?>" class="py-2 d-block">Causas/Proyectos</a></li>
                        <li><a href="<?= base_url('#') ?>" class="py-2 d-block">Nuevas Campañas</a></li>
                        <li><a href="<?= base_url('#') ?>" class="py-2 d-block">Blog</a></li>
                        <li><a href="<?= base_url('contact'); ?>" class="py-2 d-block">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">¿Tienes Preguntas?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-map"></span><span class="text">C. Ignacio Allende 61, Centro, 90300 Tlaxcala de Xicohténcatl, Tlax.</span></li>
                            <li><a href="tel:+525539656252"><span class="icon fa fa-phone"></span><span class="text">55 3965 6252</span></a></li>
                            <li><a href="mailto:trendinglocalmx@gmail.com"><span class="icon fa fa-paper-plane"></span><span class="text">trendinglocalmx@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Este template está hecho con <i class="fa fa-heart" aria-hidden="true"></i> por <a href="https://colorlib.com" target="_blank">Colorlib.com</a></p>
                </div>
            </div>
        </div>
    </footer>

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
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_CLAVE_API_DE_Maps&sensor=false"></script>
    <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/google-map.js') ?>"></script>
    <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/main.js') ?>"></script>

</body>
</html>