<?php 
    // index.php 
    require_once 'modulos/funciones.php';
    // Obtener el valor de la variable "categoria" del enlace (URL)
    $categoria = $_GET['categoria'];

    // Verificar si la variable "categoria" está definida y no está en blanco
    if (isset($categoria) && !empty($categoria)) {
        $posts = getPostsByCategory($categoria);
        
    } else {
        $posts = getPosts();
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portal Academico</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

<body>

  <!-- ======= Header ======= -->
  <?php
  include "themes/navbar.html";
  ?>
  <!-- End Header -->

  <main id="main">

    <section class="inner-page">
      <div class="container mt-5">
        <!-- contenido -->
          <h1>Categorias <?php echo $categoria ?></h1>
          <ul>
          <?php foreach ($posts as $post): ?>
          <li>
            <h2>
            <a href="post.php?id=<?php echo $post['id'] ?>">
              <div class="row">
                <?php echo $post['title'] ?>
              </div>
              <div class="row">
                <div class="col">
                  <img src="<?php echo $post['image_url'] ?>" class="img-fluid" alt="">
                  <p><?php echo $post['sinopsis'] ?></p>
                </div>
              </div>

            </a>
            <h2>
          
          </li>
          <?php endforeach; ?>
          </ul>
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