<footer id="footer">
  <div class="footer-top">
      <div class="container">
          <div class="row">

              <div class="col-lg-3 col-md-6 footer-contact">

                  <h3><?php 
                  $datos_empresa = getEmpresa();
                  $direccion = 
                  $telefono = $datos_empresa['telefono'];
                  $mail = $datos_empresa['mail'];

                  echo $nombre; ?></h3>
                  <p>
                      <?php echo $datos_empresa['direccion'];; ?><br>
                      BUenos Aires, Argentina<br><br>
                      <strong>Teléfono: </strong><?php echo $telefono; ?><br>
                      <strong>Email: </strong><?php echo $mail; ?><br>
                  </p>
              </div>

              <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Menú</h4>
                  <ul>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Nosotros</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Servicios</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Términos de Servicio</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Política de Privacidad</a></li>
                  </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                  <h4>Enlaces Útiles</h4>
                  <ul>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Diseño Web</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Ofimatica</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Software util</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Chat</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Proyecto</a></li>
                  </ul>
              </div>

              <div class="col-lg-4 col-md-6 footer-newsletter">
                  <h4>Buscar</h4>
                  <p>Escribi palabras claves separadas por comas</p>
                  <form action="bloglist.php" method="get">
                      <input type="text"  name="tag">
                      <input type="submit" value="Buscar">
                  </form>
              </div>

          </div>
      </div>
  </div>

  <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>PAEC by <a href="https://soft-cronos.com/">Soft-cRONOS</a></span></strong>. Todos los derechos reservados
          </div>
          <div class="credits">
              Diseñado por <a href="https://grupofenix.ar/">GrupoFenix</a>
          </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
  </div>
</footer>
