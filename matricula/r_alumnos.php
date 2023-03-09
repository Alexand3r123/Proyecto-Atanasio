<?php
 		session_start();
		include_once('php_conexion.php'); 
		include_once('Class/funciones.php'); 
		include_once('Class/class_alumnos.php');
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header('location:error.php');
		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blanco</title>
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
<table width="90%" border="0">
  <tr>
    <td>
    
    <table class="table table-bordered">
      <tr class="success">
        <td>
        	<div class="row-fluid">
	            <div class="span6">
                	<h3><img src="img/lis.png" class="img-circle img-polaroid" width="70" height="65"> 
                        	Reporte de Alumnos Registrados</h3>
                </div>
    	        <div class="span6" align="center">
                	<form name="form1" method="post" action="EXCEL_alumnos.php">
                    	<strong>Seleccione el Salones o Cursos</strong><br>
                        <select name="curso">
                        	<?php
								$c=mysql_query("SELECT * FROM salones WHERE estado='s'");
								while($d=mysql_fetch_array($c)){
									echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
								}
							?>                           
                            <option value="X">Imprimir Todos los Alumnos</option>
                        </select><br>
                        <button type="submit" class="btn"><strong><i class="icon-list"></i> Imprimir Reporte</strong></button>
              	    </form>
                </div>
        	</div>
        </td>
      </tr>
    </table>

    
    </td>
  </tr>
  <tr>
    <td>
    
        <table class="table table-bordered">
          <tr>
            <td>
            	<center>
            		<a href="alumnos.php" class="btn"><strong><i class="icon-user"></i> Ingresar Nuevos Alumnos</strong></a> 
                    <a href="salones.php" class="btn"><strong><i class="icon-folder-close"></i> Crear Salones o Cursos</strong></a>
            	</center>
            </td>
          </tr>
        </table>
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>