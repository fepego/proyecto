<?php $this->load->view('plantillaInicio') ?>
	   </br>
</br>
          <br> </br>
          <label for="titulo">Título Novedad</label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar título">

          <label for="fechainicio">Fecha Inicio</label>
          <input type="date" class="form-control" id="fechainicio" name="fechainicio" >

          <label for="fechafin">Fecha Fin</label>
          <input type="date" class="form-control" id="fechafin" name="fechafin" >

          <label for="descripcion">Descripción Novedad</label>
          <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingresar descripción de la novedad"></textarea>

          <label for="archivo">Adjuntar archivo</label>
          <input type="file" class="form-control" id="archivo" name="archivo" >


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