<?php $this->load->view('plantillaInicio') ?>
	   </br>
        </br>
				<?php if(isset($insert_message)) { ?>
				<div class="panel panel-success">

					<div class="panel-heading"><center><span>Novedad Actualizada correctamente</span><center></div>
					<div class="panel-body">
            <center><p><?php echo anchor('Jefe', $insert_message); ?></p></a></center>
					</div>
				</div>
				<?php } ?>
				<?php if(isset($error_message)) { ?>
				<div class="panel panel-error">

					<div class="panel-heading"><center><span>Error actualización</span><center></div>
					<div class="panel-body">
            <center><p><?php echo anchor('Jefe', $error_message); ?></p></a></center>
					</div>
				</div>
				<?php } ?>
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
