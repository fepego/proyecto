<?php $this->load->view('plantillaInicio') ?>
	   </br>
        </br>
        <h1>Consultar Novedad</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php if(isset($novedad))
            {
              foreach ($novedad as $n) {
             ?>
          <tr>
            <td> <?php echo $n->ID ?></td>
            <td> <?php echo $n->Titulo ?></td>
            <td> <?php  echo $n->FechaInicio ?></td>
            <td><?php echo $n->FechaFin ?></td>
            <td> <?php echo $n->Estado ?></td>
  				</tr>
            <?php }} ?>
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
