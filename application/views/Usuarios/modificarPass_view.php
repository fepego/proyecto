<?php $this->load->view('plantillaInicio') ?>
								<h1>Modificar Contraseña</h1>
                </center>
                <div class="container">
                  <?php $attributes = array("class" => "form-group", "id" => "formacambioPass", "name" => "formacambioPass");
                  echo form_open("Usuario/actualizarPass", $attributes);?>
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
                        <label for="passAct">Contraseña Actual</label>
                        <input type="password" class="form-control" id="passAct" name="passAct" placeholder="Ingresar contraseña actual" value="<?php echo set_value('passAct') ?>">
                        <label for="passNuev">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="passNuev" name="passNuev" placeholder="Ingresar contraseña nueva" value="<?php echo set_value('passNuev') ?>">
                        <label for="passConf">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="passConf" name="passConf" placeholder="Ingresar confirmación" value="<?php echo set_value('passConf') ?>">
                      </div>
                      <input type="hidden" name="usuario" value="<?php echo $usu ?>">
                      <button type="submit" class="btn btn-default">Enviar</button>
                    </fieldset>
                  <?php
                  echo form_close(); ?>
                </div>
      </div>

    	</div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
