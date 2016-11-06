<?php $this->load->view('plantillaInicio') ?>
	   </br>
        </br>
        <h1>Iniciar Sesión</h1>
         <div class="container">
									<?php
										if (isset($error_message)) {
											echo "<div class='alert alert-danger'>";
											echo $error_message;
											echo "</div>";
										}
										?>
										<?php
											if(validation_errors())
											{
												echo "<div class='alert alert-danger'>";
												echo validation_errors();
												echo "</div>";
											}
											?>
                   <div class="row">
                        <div class="col-lg-4 col-sm-4 well">
                        <?php
                        $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                        echo form_open("Usuario/inicio", $attributes);?>
                        <fieldset>
                             <legend>Login</legend>
                             <div class="form-group">
                             <div class="row colbox">
                             <div class="col-lg-4 col-sm-4">
                                  <label for="username" class="control-label">Usuario</label>
                             </div>
                             <div class="col-lg-8 col-sm-8">
                                  <input class="form-control" id="username" name="username" placeholder="Username" type="text" value="<?php echo set_value('username'); ?>" />
                                  <span class="text-danger"><?php echo form_error('username'); ?></span>
                             </div>
                             </div>
                             </div>

                             <div class="form-group">
                             <div class="row colbox">
                             <div class="col-lg-4 col-sm-4">
                             <label for="password" class="control-label">Contraseña</label>
                             </div>
                             <div class="col-lg-8 col-sm-8">
                                  <input class="form-control" id="password" name="password" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
                                  <span class="text-danger"><?php echo form_error('password'); ?></span>
                             </div>
                             </div>
                             </div>

                             <div class="form-group">
                             <div class="col-lg-12 col-sm-12 text-center">
                                  <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
                                  <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                             </div>
                             </div>
                        </fieldset>
												<?php echo form_close(); ?>
                    </div>

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