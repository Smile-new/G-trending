<!-- Vista del footer con noticias recientes, enlaces y contacto -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Trending Local</h2>
                    <p>Conéctate con lo local. Noticias, eventos y servicios en tu comunidad.</p>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="LinkedIn"><span class="fa fa-linkedin"></span></a></li>
                    </ul>
                </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
    <h2 class="footer-heading">Noticias Recientes</h2>

    <?php if (!empty($recientes)): ?>
        <?php foreach (array_slice($recientes, 0, 2) as $reciente): ?>
            <div class="block-21 mb-4 d-flex">
                <!-- Imagen de la noticia -->
                <a class="img mr-4 rounded" style="background-image: url('<?= !empty($reciente['ruta_foto']) ? base_url($reciente['ruta_foto']) : base_url(RECURSOS_PUBLICOS_IMAGES . '/placeholder.jpg') ?>');"></a>
                
                <div class="text">
                    <!-- Título con enlace al detalle -->
                    <h3 class="heading"><a href="<?= site_url('vistaspublicas/detallePublicacion/' . $reciente['id']) ?>"><?= esc($reciente['titulo']) ?></a></h3>
                    
                    <!-- Fecha y autor opcional -->
                    <div class="meta">
                        <div><a href="#"><span class="fa fa-calendar"></span> <?= date('d M, Y', strtotime($reciente['fecha_publicacion'])) ?></a></div>
                        <div><a href="#"><span class="fa fa-user"></span> <?= esc($reciente['usuario_nombre'] ?? 'Admin') ?></a></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p><em>No hay noticias recientes</em></p>
    <?php endif; ?>
</div>

            <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                <h2 class="footer-heading">Enlaces Rápidos</h2>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url('/'); ?>" class="py-2 d-block">Inicio</a></li>
                    <li><a href="<?= base_url('about'); ?>" class="py-2 d-block">Servicios</a></li>
                    <li><a href="<?= base_url('causes'); ?>" class="py-2 d-block">Encuestas y Estudios</a></li>
                    <li><a href="<?= base_url('contact'); ?>" class="py-2 d-block">Contáctanos</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <h2 class="footer-heading">¿Tienes Preguntas?</h2>
                <div class="block-23 mb-3">
                    <ul>
                        <li><span class="icon fa fa-map"></span><span class="text">Calle Ignacio Allende 61, Centro, 90300 Tlaxcala de Xicohténcatl, Tlax.</span></li>
                        <li><a href="tel:+525539656252"><span class="icon fa fa-phone"></span><span class="text">55 3965 6252</span></a></li>
                        <li><a href="mailto:trendinglocalmx@gmail.com"><span class="icon fa fa-paper-plane"></span><span class="text">trendinglocalmx@gmail.com</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p class="copywrite-text">&copy; <?= date('Y') ?> Todos los derechos reservados | Este sitio fue creado por Ranker</p>
            </div>
        </div>
    </div>
</footer>
