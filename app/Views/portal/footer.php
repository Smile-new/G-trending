<!-- Vista del footer con noticias recientes, enlaces y contacto -->
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
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="footer-heading">Noticias Recientes</h2>
                    <ul class="list-unstyled">
                        <?php if (!empty($recientes)): ?>
                            <?php foreach ($recientes as $reciente): ?>
                                <li>
                                    <a href="<?= site_url('vistaspublicas/detallePublicacion/' . $reciente['id']); ?>">
                                        <?= esc($reciente['titulo']); ?>
                                    </a>
                                    <small class="d-block text-muted">
                                        <?= date('d/m/Y', strtotime($reciente['fecha_publicacion'])); ?>
                                    </small>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><em>No hay noticias recientes</em></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                <h2 class="footer-heading">Enlaces Rápidos</h2>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url('/'); ?>" class="py-2 d-block">Inicio</a></li>
                    <li><a href="<?= base_url('about'); ?>" class="py-2 d-block">Servicios</a></li>
                    <li><a href="<?= base_url('causes'); ?>" class="py-2 d-block">Encuestas y estudios</a></li>
                    <li><a href="<?= base_url('contact'); ?>" class="py-2 d-block">Contáctanos</a></li>
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
                <p class="copyright">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Template by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                </p>
            </div>
        </div>
    </div>
</footer>
