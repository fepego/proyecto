<?php $this->load->view('plantillaInicio') ?>
	   </br>
</br>
          <br> </br>
      
     <div class="container">
      <?php $attributes = array("class" => "form-group", "id" => "formaRegistro", "name" => "formaRegistro");
      echo form_open("analista/leerNovedad", $attributes);?>

         
         <div class="form-group">

          <label for="fecha">Fecha</label>
          <input type="date" class="form-control" id="fecha" name="fecha" >
             
          <label for="hora">Hora</label>
          <input type="time" class="form-control" id="hora" name="hora" placeholder="Ingresar hora">

            
      </div>
         
         <button type="submit" class="btn btn-default">Enviar</button>
                 
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