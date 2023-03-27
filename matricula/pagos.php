<?php
 		session_start();
		include_once('php_conexion.php'); 
		include_once('Class/funciones.php'); 
		include_once('Class/class_alumnos.php');
		if($_SESSION['tipo_usu']=='a' ){
		}else{
			header('location:error.php');
		}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Realizar Pagos</title>
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
	<table width="90%">
      <tr>
        <td>
        
        	<table class="table table-bordered">
              <tr class="success">
                <td><center><h2>Realizar Pagos</h2><strong><?php echo fecha(date('Y-m-d')); ?></strong></center></td>
              </tr>
            </table>

            <table class="table table-bordered">
              <tr>
                <td>
                	<form name="form2" action="" method="post">
                    <div class="row-fluid">
                    	<div class="span4" align="center">
                        	<strong>Documento del Alumno</strong><br>
                    		<input type="text" name="alumno" autocomplete="off" class="input-xlarge" required>
                        </div>
						<div class="span4" align="center">
                        	<strong>Concepto</strong><br>
                            <select name="concepto" class="input-xlarge">
                            	<option value="OTRO">Otros Pagos</option>
                                <option value="MATRICULA">Matricula</option>
                            </select><br>
                            <button type="submit" class="btn"><strong>Registrar Pago</strong></button>
                        </div>
                        <div class="span4" align="center">
                        	<strong>Valor</strong><br>
                            <input type="number" min="1" value="1" name="valor" autocomplete="off" class="input-xlarge" required><br>
                        </div>
                    </div>
                    </form>
                
                </td>
              </tr>
            </table>
            
            <?php
				if(!empty($_POST['alumno'])){
					$alumno=limpiar($_POST['alumno']);	$concepto=limpiar($_POST['concepto']);	$valor=limpiar($_POST['valor']);
					$fecha=date('Y-m-d');
					$sql=mysql_query("SELECT * FROM alumnos WHERE nit='$alumno'");
					if($row=mysql_fetch_array($sql)){
						mysql_query("INSERT INTO pagos (alumno,concepto,valor,fecha) VALUES ('$alumno','$concepto','$valor','$fecha')");	
						echo mensajes('Se ha Registrado el Pago de $ '.number_format($valor).' del Alumno "'.$row['nombre'].' '.$row['apellido'].'" con Exito','verde');
					}else{
						echo mensajes("El NIT que desea consultar no Existe en la Base de Datos","rojo");	
					}
					
				}
			?>
        </td>
      </tr>
    </table>

</div>
</body>
</html>