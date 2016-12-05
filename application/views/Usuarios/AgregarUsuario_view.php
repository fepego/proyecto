<?php $this->load->view('plantillaInicio') ?>
	   </br>
        </br>
        <h1>Agregar Usuario</h1>
        </center>
          <div class="container">
            <?php $attributes = array("class" => "form-group", "id" => "formaRegistro", "name" => "formaRegistro");
            echo form_open("Usuario/setUsuario", $attributes);?>
              <fieldset>
                   <?php
                      if(validation_errors())
                      {
                        echo "<div class='alert alert-danger'>";
                                        echo validation_errors();
                                        echo "</div>";
                      }
                                        ?>
                  <?php
                                        if (isset($error_message)) {
                      echo "<div class='alert alert-danger'>";
                                            echo $error_message;
                      echo "</div>";
                                        }
                                        ?>
                <?php
                                    if (isset($insert_message)) {
                    echo "<div class='alert alert-success'>";
                                        echo $insert_message;
                    echo "</div>";
                                    }
                                    ?>
                <div class="form-group">
                          <label for="usuario">ID Usuario</label>
                          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresar Usuario" value="<?php echo set_value('usuario') ?>">
                          <label for="nombreUsuario">Nombre Empleado</label>
                          <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Ingresar Nombre Empleado" value="<?php echo set_value('nombreUsuario') ?>">
                          <label for="email">Correo Electronico</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Ingresar Email" value="<?php echo set_value('email') ?>">
                          <label for="rol">Rol Autorización</label>
                          <select class="form-control" name="rol">
                            <?php
                            if(isset($roles))
                            {
                              foreach ($roles->result() as $r) {
                                echo "<option>".$r->nombre_rol."</option>";
                              }
                            }

                            ?>
                        </select>
                         <center><button type="submit" class="btn btn-success">Crear</button></center>
              </fieldset>
              <?php
                 echo form_close(); ?>
							 </div>
						 </div>
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
