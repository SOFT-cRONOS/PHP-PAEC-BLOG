<?php 
// conexion
require_once 'modulos/funciones.php'; 
$post = getUltiPost();
$posts = getPosts();

include "themes/head.html";
?>


<body>
  <!-- ======= Header ======= -->
  <?php
  include "themes/navbar.html";
  ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
      <div class="container position-relative">
        <h1>Te damos la bienvenida</h1>
        <h2>Este es un portal academico para concentrar material util</h2>
        <a href="#ultimopost" class="btn-get-started scrollto">Explorar</a>
      </div>
    </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= UltimosPostSoftware======= -->
      <section id="ultimopost" class="">
        <div class="container">
          <div class="section-title">
              <h2>Esto te puede interesar</h2>
          </div>

          <div class="row  justify-content-center">
            <div class="col-lg-6">
              <img src="<?php echo $post['image_url'] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-3 pt-4 pt-lg-0">
              <h3><?php echo $post['title'] ?></h3>
              <div class="row">
                <div class="col-1">
                  <i class="bx bx-receipt"></i>
                </div>
                <div class="col">
                  <p>
                    <?php echo $post['date'] ?>
                  </p>
                </div>
              </div>
              <div class="row">

                    <p><?php echo $post['sinopsis'] ?>...</p>
                    <div class="col">
                    <a class="botn-link" href="post.php?id=<?php echo $post['id'] ?>"> Ver mas +</a>
                    </div>
                    <p>Autor: <?php echo $post['nick'] ?></p>
                    <p>Categoria: <?php echo $post['categoria'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- End UltimoPost -->

  
    <!-- ======= Servicios Section ======= -->
      <section id="servicios" class="services">
        <div class="container">

          <div class="section-title">
            <h2>+ Contenido</h2>
            <p>Esto es lo que tenemos para vos. Explora todo el contenido, categorias de los articulos y software disponible en este portal.</p>
          </div>

          <div class="row">

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box iconbox-blue">
                <div class="icon">
                  <i class="bx bxl-dribbble"></i>
                </div>
                <h4><a href="">Internet</a></h4>
                <p>Programas para navegar, seguridad y redes informaticas</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box iconbox-orange ">
                <div class="icon">
                  <i class="bx bx-file"></i>
                </div>
                <h4><a href="">Documentos</a></h4>
                <p>Procesadores de texto, planillas de calculo, presentaciones, PDF, Notas</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box iconbox-pink">
                <div class="icon">
                  <i class="bx bx-tachometer"></i>
                </div>
                <h4><a href="">Mantenimiento</a></h4>
                <p>Tutoriales y programas para mantenimiento, optimizacion y control del PC</p>
              </div>
            </div>
            
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box iconbox-yellow">
                <div class="icon">
                  <i class="bx bx-layer"></i>
                </div>
                <h4><a href="">Programacion</a></h4>
                <p>SQL, PYTHON, PHP y mas lenguajes. IDE'S con ejemplos de software basico y avanzado</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box iconbox-red">
                <div class="icon">
                  <i class="bx bx-slideshow"></i>
                </div>
                <h4><a href="">Multimedia</a></h4>
                <p>Material didactico, entretenimiento y software multimedia</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box iconbox-teal">
                <div class="icon">
                  <i class="bx bx-arch"></i>
                </div>
                <h4><a href="">Explorar</a></h4>
                <p>Actualizaremos contenido nuevo, explora ahora.</p>
              </div>
            </div>

          </div>

        </div>
      </section>
    <!-- End Servicios Section -->


    <!-- ======= PostSection ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container">

          <div class="section-title">
            <h2>Explora el contenido mas reciente</h2>
            <p>Los ultimos posteos estan ordenados en esta seccion, navega y encontra la informacion que necesitas. Filtros por categoria y orden por fecha de cada post de este Portal.</p>
          </div>

          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">Todos</li>
                <?php $categorias = getCategorias();
                foreach ($categorias as $filtro): ?>
                  <li data-filter=".<?php echo $filtro['nombre'] ?>"><?php echo $filtro['nombre'] ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>

          <div class="row portfolio-container">

          
            <?php $posts = getPosts();
            foreach ($posts as $posteo): ?>
              <div class="col-lg-4 col-md-6 portfolio-item <?php echo $posteo['categoria'] ?>">
                <img src="<?php echo $posteo['image_url'] ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?php echo $posteo['title'] ?></h4>
                  <p><?php echo $posteo['categoria'] ?></p>
                  <!-- <a href="" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a> -->
                  <a href="post.php?id=<?php echo $posteo['id'] ?>" class="btn btn-primary">Ver+</a>
                </div>
              </div>
            <?php endforeach; ?>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="assets/img/plantilla.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Explorar Todo</h4>
                <a href="categorias.php" class="btn btn-primary">Ver+</a>
              </div>
            </div>

          </div>

        </div>
      </section>
    <!-- End Post Section Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include "themes/footer.php";
  ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>