<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unicare - Free Bootstrap 4 Template by Colorlib</title>
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
                   <li class="nav-item active"><a href="<?= base_url('/'); ?>" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="<?= base_url('about'); ?>" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="<?= base_url('causes'); ?>" class="nav-link">Causes</a></li>
                    <li class="nav-item"><a href="<?= base_url('contact'); ?>" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/5.jpg') ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url() ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Causes <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-0 bread">Causes</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php if (!empty($publicaciones)): ?>
                <?php foreach ($publicaciones as $publicacion): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="causes causes-2 text-center ftco-animate" style="margin-bottom: 20px;">
                            <a href="#" class="img w-100" style="background-image: url(<?= base_url($publicacion['ruta_foto']) ?>); height: 180px; background-size: cover; background-position: center;"></a>
                            <div class="text p-2">
                                <h2 style="font-size: 16px;"><?= esc($publicacion['titulo']) ?></h2>
                                <p style="font-size: 12px;">Categoría: <strong><?= esc($publicacion['categoria_nombre']) ?></strong></p>
                                <p style="font-size: 12px;">Fecha de Publicación: <strong><?= esc(date('d M, Y', strtotime($publicacion['fecha_publicacion']))) ?></strong></p>
                                <p>
                                    <a href="<?= base_url('publicacion/ver-resultados/' . $publicacion['id']) ?>" class="btn btn-light w-100 btn-sm">
                                        Ver resultados
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>No se encontraron publicaciones activas en este momento.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Unicare.</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                    <p><a href="#" class="btn btn-quarternary">Donate Now</a></p>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Latest News</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="img mr-4 rounded" style="background-image: url(<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/image_1.jpg') ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                            <div class="meta">
                                <div><a href="#">Jul 20, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#">19</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="img mr-4 rounded" style="background-image: url(<?= base_url(RECURSOS_PUBLICOS_IMAGES . '/image_2.jpg') ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                            <div class="meta">
                                <div><a href="#">Jul 20, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#">19</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                    <h2 class="footer-heading">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Home</a></li>
                        <li><a href="#" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Causes</a></li>
                        <li><a href="#" class="py-2 d-block">New Campaigns</a></li>
                        <li><a href="#" class="py-2 d-block">Blog</a></li>
                        <li><a href="#" class="py-2 d-block">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-map"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">

                    <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        </p>
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/google-map.js') ?>"></script>
        <script src="<?= base_url(RECURSOS_PUBLICOS_JS . '/main.js') ?>"></script>

</body>
</html>