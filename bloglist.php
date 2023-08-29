<!DOCTYPE html>
<html lang="en">
<?php 
    // index.php 
    require_once 'modulos/funciones.php';
    // Obtener el valor de la variable "categoria" del enlace (URL)
    $tag = $_GET['tag'];

    // Verificar si la variable "categoria" está definida y no está en blanco
    if (isset($tag) && !empty($tag)) {
        // $posts = getPostsByCategory($tag);
        $posts = getTagsPost($tag);
        
    } else {
        $posts = getPosts();
        
    }
?>
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
  <!-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

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
      <div class="container mt-6 list-xl" >
      <!-- contenido -->
        <div class="search-container">
          <form action="categorias.php" method="get">
            <input type="text" placeholder="buscar.." name="categoria">
            <button type="submit">Buscar</button>
          </form>
        </div>
          <h1>Resultados de <?php echo $tag ?></h1>
          <br>
          <br>
          <?php 
            if (empty($posts)) {
            ?>
              <h3 class= container>oh! no se encontro nada con <?php echo $tag ?></h3>
            <?php 
            } else { ?>
          <ul>
            <?php 
            foreach ($posts as $post): ?>
            <li style=" 
              <?php if ((intval($post['id']) % 2) == 0) {
                        //Es un número par
                        echo 'background-color:rgb(55, 64, 85)';
                    } else {
                        //Es un número impar
                        echo 'background-color:#5f6f92';
                    }
              ?>                 
              ">
              <h2>
              <a href="post.php?id=<?php echo $post['id'] ?>">
                <div class="row">
                  <div class="col-md-5">
                    <img src="<?php echo $post['image_url'] ?>" class="img-fluid" alt="">
                  </div>
                  <div class="col">
                    <!-- titulo -->
                    <h2 class="title"><?php echo $post['title'] ?></h2>
                    <p><?php echo $post['sinopsis'] ?>...</p>
                  </div>
                </div>
              </a>
              <h2>
            
            </li>
            <?php endforeach;
            } ?>
          </ul>
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