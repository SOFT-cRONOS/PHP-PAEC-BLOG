<?php 
  // index.php 
  require_once 'modulos/funciones.php'; 
  $post = getPostById($_GET['id']);

  include "themes/head.html";
?>


<body>

  <!-- ======= Header ======= -->
  <?php
  include "themes/navbar.html";
  ?>
  <!-- End Header -->

  <main id="main">
  <div class="banner-post align-items-center justify-content-center" style="width: 100%; height: 290px; overflow: hidden;">
      <img src="<?php echo $post['image_url'] ?>" class="img-fluid" alt="">
  </div>
    <section class="inner-page">
      <div class="container">
        <div class="row">
          <!-- barra izquierda -->
            <div class="col-1">
            
            </div>
          <!-- contenido post -->
            <div class="col contenido">
              <div class=row>
                <div class="col">
                  <div>Fecha:<?php echo $post['date'] ?></div>
                </div>
                <div class="col">
                  <div>Autor: <?php echo $post['author'] ?></div>
                </div>
              </div>
              <hr class="separator">
              <h1><?php echo $post['title'] ?></h1>
              <br>
              <div>
                <?php echo $post['content'] ?>
              </div>
              <div>
                <br>
                  <a href="showPdf.php?id=<?php echo $_GET['id'] ?>">Print PDF</a>
                <br>
                <br>
                  <a href="../">Return to main page</a>
              </div>
            </div>
          <!-- barra derehca -->
            <div class="col-3 rightbar align-items-center justify-content-center">
              <?php
                $posts = getPosts();
                include "themes/rightbar.php";
              ?>
            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include "themes/footer.html";
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