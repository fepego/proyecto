<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Sistema Banco</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <!-- Custom styles for this template -->
  	<link rel="stylesheet" href="<?php echo base_url("assets/css/starter-template.css"); ?>" />
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost/proyecto">Mesa de Servicio de Tecnología - Banco Occidente</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo site_url('/welcome/'); ?>">Inicio</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
                if(isset($this->session->userdata['login']))
                {
                  ?><li><a href="<?php echo site_url('/Usuario/cerrarSesion/'); ?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
              <?php  }
                else {
                  ?><li><a href="<?php echo site_url('/Usuario/iniciarSesion/'); ?>"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
              <?php  }
             ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
      <div class="container">
      <div class="starter-template">
