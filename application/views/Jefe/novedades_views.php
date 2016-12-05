<?php $this->load->view('plantillaInicio') ?>
	   </br>
</br>
          <br> </br>

     <div class="container">
      <?php $attributes = array("class" => "form-group", "id" => "formaRegistro", "name" => "formaRegistro");
      echo form_open_multipart("Jefe/actualizarNovedad", $attributes);?>

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
          <label for="titulo">Título Novedad</label>
          <input type="text" class="form-control" id="titulo" name="titulo"  disabled="true" value= "<?php echo $novedad->Titulo ?>">
          <label for="fechaInicio">Fecha Inicio</label>
          <input type="text" class="form-control" id="fechaInicio" name="fechaInicio" disabled="true" value= "<?php echo $novedad->FechaInicio ?>">
          <label for="fechaFin">Fecha Final</label>
          <input type="text" class="form-control" id="fechaFin" name="fechaFin" disabled="true" value= "<?php echo $novedad->FechaFin ?>">
          <label for="descripcion">Descripción Novedad</label>
          <textarea class="form-control" id="descripcion" name="descripcion" disabled="true"><?php echo $novedad->Descripcion ?></textarea>
				  <input type="hidden" name="id" value="<?php echo $novedad->ID ?>">
					<select class="form-control" name="estado">
						<option value="PENDIENTE">PENDIENTE</option>
						<option value="APROBADO">APROBADO</option>
						<option value="DENEGADO">DENEGADO</option>
					</select>

      </div>
					<center> <button type="submit" class="btn btn-success">Enviar</button></center>
        <?php
        echo form_close(); ?>

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
