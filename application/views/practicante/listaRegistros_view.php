<?php $this->load->view('plantillaInicio') ?>
	   </br>
        </br>
        <h1>Resultados de Asignaciones</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Analista</th>
              <th>Fecha Registro</th>
              <th>No. Casos Asignados</th>
              <th>Novedad</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if(isset($registros)){

              foreach ($registros->result() as $r) { ?>
          <tr>
            <td><?php echo $r->ID?></td>
            <td><?php echo $r->Analista?></td>
            <td> <?php echo $r->Fecha ?></td>
            <td><?php echo $r->CantidadCasos ?></td>
            <td><?php echo $r->novedad ?></td>
          </tr>
            <?php }
          }?>
          </tbody>
        </table>
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
