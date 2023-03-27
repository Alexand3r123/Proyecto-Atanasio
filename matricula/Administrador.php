<?php
		session_start();
		include('php_conexion.php'); 
		if($_SESSION['tipo_usu']=='a' ){
		}else{
			header('location:error.php');
		}
		if($_SESSION['tipo_usu']=='a'){
			$titulo='Administrador';
		}else{
			$titulo='Usuario';
		}
		$usuario=limpiar($_SESSION['username']);
		$sqll=mysql_query("SELECT * FROM usuarios WHERE usu='$usuario'");
		if($dato=mysql_fetch_array($sqll)){
			$nombre=$dato['nom'];
			$palabra=explode(" ", $nombre);
			$nomb=$palabra[0];
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.dropdown {
	font-family:"Comic Sans MS", cursive;
	font-size:20px;
		color:#000;
	font-weight:800;
	
}
.container {
	
	margin:-30px 0 0 0;
	
	}
.icon-user{
	margin:7px 0 0 0;
	}
.dropdown-toggle{
	border:2px solid #C9C;
	
	
	}

</style>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">

<div class="img"></div>


<table width="98%" border="0">
  <tr>
    <td>
    <div id="navbar-example" class="navbar navbar-static">
     
        <div class="container" style="width: auto;">
          <a class="brand" href="inicio.php" target="admin"><?php echo $titulo; ?></a>
          <ul class="nav" role="navigation">
            <li class="dropdown">
              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="noticias.php" target="admin"><i class="icon-user"></i> Noticias</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="alumnos.php" target="admin"><i class="icon-folder-open"></i> Alumnos</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="docentes.php" target="admin"><i class="icon-list"></i> Docentes</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="salones.php" target="admin"><i class="icon-list"></i>Aulas </a></li>
                <!--<li role="presentation" class="divider"></li>-->  
              </ul>
            </li>
            <!--
            <li class="dropdown">
              <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Caja<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="contable.php" target="admin">Entrada y Salida de Dinero</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="cierre_caja.php" target="admin">Cierre de Caja</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="detalle.php?fecha=" target="admin">Detalle de Efectivo</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="crear_usu.php" target="admin">Registrar Cajeros</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="compras.php" target="admin">Compras</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="listado_compras.php" target="admin">Listado Compras</a></li>
                <!-- <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="conceptos.php" target="admin">Administrar Conceptos</a></li>
              </ul>
            </li>
            -->
            <li class="dropdown">
              
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="r_alumnos.php" target="admin"><i class="icon-th-list"></i> 
                Listado de Alumnos</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="reporte_pagos.php" target="admin"><i class="icon-th-list"></i> 
                Reportes de Pago - Alumnos</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="reporte_pagos2.php" target="admin"><i class="icon-th-list"></i> 
                Reportes de Pago - Conceptos</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Buen dia! <?php echo $nomb; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
              	<li role="presentation"><a role="menuitem" tabindex="-1" href="bd.php" target="admin"><i class="icon-refresh"></i> Iniciar BD</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php" target="admin"><i class="icon-user"></i> Crear Usuarios</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="cambiar_clave.php" target="admin"><i class="icon-refresh"></i> Cambiar Contraseña</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="php_cerrar.php"><i class="icon-off"></i> Salir</a></li>
              </ul>
            </li>
          </ul>
        </div>
 
    </div>
    </td>
  </tr>
  <tr>
    <td><iframe src="inicio.php" frameborder="0" scrolling="yes" name="admin" width="100%" height="500"></iframe></td>
  </tr>
  <tr>
    <td>
  </br>
  </br></br></br>
    
    <pre><center><strong><a href="#" target="_blank" style="color:#000"></a></strong></center></pre>
    </td>
  </tr>
</table>
</body>
</html>