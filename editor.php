<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Baker Bootstrap Template</title>
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
      <div class="container mt-6">
        <!-- contenido -->


        <h1>Editor de Blog</h1>

        <?php
          include "themes/editor_quill.php";
        ?>

      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include "themes/footer.php";
  ?>
  <!-- End Footer -->

  <!-- =======   Back top top button =======  -->
  <?php
      include "themes/back_to_top.html";
    ?>
  <!-- =======   End top top button =======  -->

  <!-- ======= script links ======= -->
    <?php
      include "themes/scripts_links.html";
    ?>
  <!-- End script links -->


</body>

</html>
