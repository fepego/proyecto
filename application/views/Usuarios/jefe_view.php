<?php $this->load->view('plantillaInicio') ?>
	   </br>
        </br>
        <h1>Jefe Menú Principal</h1>
        </center>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo site_url('/welcome') ?>">Módulo cuentas y Usuarios</a></li>
     		     <li><a href="<?php echo site_url('Usuario/actualizarPass')?>">Modificar Contraseña</a></li>
                <li><a href="<?php echo site_url('Usuario/agregarUsuario/')?>">Agregar Usuario</a></li>
   		   </ul>
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
