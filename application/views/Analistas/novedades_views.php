<?php $this->load->view('plantillaInicio') ?>
	   </br>
</br>

<label for="usuario">Nombre Usuario</label>
                          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresar Usuario">
                          <label for="nombreUsuario">Nombre Empleado</label>
                          <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Ingresar Nombre Empleado" >
                          <label for="telefono">Telefono/Celular</label>
                          <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresar teléfono/Celular Empleado">
                          <label for="email">Correo Electronico</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Ingresar Email">
                          <label for="direccion">Dirección</label>
                          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresar dirección" value="<?php echo set_value('direccion') ?>">
                          <label for="rol">Rol Autorización</label>
                          <select class="form-control" name="rol">
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>