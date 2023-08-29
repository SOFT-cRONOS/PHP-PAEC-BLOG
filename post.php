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
                  <div>Autor: <?php echo $post['nick'] ?></div>
                </div>
                <div class="col">
                  <div>Categoria: <?php echo $post['categoria'] ?></div>
                </div>
              </div>
              <hr class="separator">
              <h1><?php echo $post['title'] ?></h1>
              <br>
              <div>
                <?php echo $post['content'] ?>
              </div>
              <div class="post-footer">
                <div>
                  <h6>Tags: 
                  <?php
                    $tags = getTagsbypost($_GET['id']);
                    foreach ($tags as $tag): 
                  ?>
                  <a href="bloglist.php?tag=<?php echo urlencode($tag); ?>" class="tags"><?php echo htmlspecialchars($tag);?></a>
                  <?php
                    endforeach;
                  ?>
                  </h6> 
                </div>
                <br>
                  <a href="post.php?id=<?php echo intval($_GET['id']) + 1 ?>">Siguiente articulo</a>
                <br>
                <br>
                  <a href="index.php">Volver a Inicio</a>
              </div>
            </div>
          <!-- barra derehca -->
            <div class="col-3 rightbar align-items-center justify-content-center">
              <?php
                
                include "themes/rightbar.php";
              ?>
            </div>
        </div>
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