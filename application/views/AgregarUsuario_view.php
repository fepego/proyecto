<?php $this->load->view('plantillaInicio') ?>
	   </br>
        </br>
        <h1>Agregar Usuario</h1>
        </center>
          <div class="container">
            <?php $attributes = array("class" => "form-group", "id" => "formaRegistro", "name" => "formaRegistro");
            echo form_open("gestionUsuario/validarUsuario", $attributes);?>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>