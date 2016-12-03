<?php $this->load->view('plantillaInicio') ?>
	   </br>
        </br>
        <h1>Menú Principal Practicante</h1>

				<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="<?php echo site_url('/welcome') ?>">Módulo cuentas y Usuarios</a></li>
				 <li><a href="<?php echo site_url('Usuario/actualizarPass')?>">Modificar Contraseña</a></li>
		 		</ul>
				<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="<?php echo site_url('/welcome') ?>">Reportes</a></li>
				 <li><a href="<?php echo site_url('practicante/asignar')?>">Agregar Reporte Asignaciones</a></li>
				 <li><a href="<?php echo site_url('practicante/consultarReportes')?>">Consultar Reportes de Asignaciones</a></li>
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
