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

  <!-- CKEditor.  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="assets/js/ckeditor5-document/ckeditor.js"></script>
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

        <!-- The toolbar will be rendered in this container. -->
        <div id="toolbar-container"></div>

        <!-- This container will become the editable. -->
        <div class="document-editor">
			<div class="toolbar-container"></div>
			<div class="content-container">
				<div id="editor">
					<h2>The three greatest things you learn from traveling</h2>
		
					<p>Like all the great things on earth traveling teaches us by example. Here are some of the most precious lessons I’ve learned over the years of traveling.</p>
		
					<h3>Appreciation of diversity</h3>
		
					<p>Getting used to an entirely different culture can be challenging. While it’s also nice to learn about cultures online or from books, nothing comes close to experiencing <a href="https://en.wikipedia.org/wiki/Cultural_diversity">cultural diversity</a> in person. You learn to appreciate each and every single one of the differences while you become more culturally fluid.</p>
		
					<figure class="image image-style-align-right"><img src="assets/js/ckeditor5-document/sample/img/umbrellas.jpg" alt="Three Monks walking on ancient temple.">
						<figcaption>Leaving your comfort zone might lead you to such beautiful sceneries like this one.</figcaption>
					</figure>
		
					<h3>Confidence</h3>
		
					<p>Going to a new place can be quite terrifying. While change and uncertainty makes us scared, traveling teaches us how ridiculous it is to be afraid of something before it happens. The moment you face your fear and see there was nothing to be afraid of, is the moment you discover bliss.</p>
				</div>
			</div>
		</div>

        <script>



          DecoupledEditor
            .create( document.querySelector( '#editor' ), {
              // toolbar: [ 'heading', '|', 'bold', 'italic', 'link','EasyImage', 'insertImage' ]
              image: {
                      upload: {
                        // Asegúrate de que esta URL sea correcta y apunte al directorio correcto.
                        // Debe ser algo como "/PAEC/assets/img/images-post/"
                        // Reemplaza la URL con la ruta correcta en tu servidor.
                        uploadUrl: '/PAEC/assets/img/images-post/'
                      }
                    }
            } )
            .then( editor => {
              const toolbarContainer = document.querySelector( 'main .toolbar-container' );

              toolbarContainer.prepend( editor.ui.view.toolbar.element );

              window.editor = editor;
            } )
            .catch( err => {
              console.error( err.stack );
            } );
        </script>

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

  <!-- <script>
        CKEDITOR.replace( 'mensajes',
        {
        height: '500px',
        });
  </script> -->

</body>

</html>
