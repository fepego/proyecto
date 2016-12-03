<?php $this->load->view('plantillaInicio') ?>
								<h1>Recuperar Contraseña</h1>
								</center>
                <div class="panel panel-success">
                  <?php
                  if(isset($assert_message))
                  {
                    echo "<div class='panel-heading'><center><span>Cambio de contraseña éxitoso</span><center></div>";
                    echo "<div class='anel-body'><p>La contraseña de respaldo es".$id."</p></div>";
                    echo "<div class='panel-body'><a href= ".site_url('/Welcome').">Regresar</a></div>";
                  }
                  else {
                    echo "<div class='panel-heading'><center><span>Cambio de contraseña fallido</span><center></div>";
                    echo "<div class='panel-body'><p>Se presento un error de actualización contacte con soporte técnico</p></div>";
                    echo "<div class='panel-body'><a href= ".site_url('/Welcome').">Regresar</a></div>";
                  }
                   ?>


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
