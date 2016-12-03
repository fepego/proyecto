<?php $this->load->view('plantillaInicio') ?>
								</br>
								<br>
								<h1>Reporte de Casos asignados</h1>
								</center>
                <div class="panel panel-success">
                  <div class="panel-heading"><center><span>Se agregó correctamente el reporte a las <?php echo date('Y-m-d H:i:s',strtotime($hora)) ?></span><center></div>
                  <center><div class="panel-body"><a href= "<?php echo site_url('/practicante/') ?>">Regresar</a></div><center>
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
