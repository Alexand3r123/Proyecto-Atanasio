<?php
 		session_start();
		include_once('php_conexion.php'); 
		include_once('Class/funciones.php'); 
		include_once('Class/class_alumnos.php');
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header('location:error.php');
		}
		
		if(!empty($_POST['fechai']) or !empty($_POST['fechaf'])){
			$fechai=limpiar($_POST['fechai']);
			$fechaf=limpiar($_POST['fechaf']);
			$concepto=limpiar($_POST['concepto']);
		}else{
			$concepto='';
			$fechai=date('Y-m-d');
			$fechaf=date('Y-m-d');
		}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte de Pagos</title>
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
                <td><h2 align="center">Reporte de Pagos por Concepto</h2></td>
              </tr>
            </table>
            
            <table class="table table-bordered">
              <tr>
                <td>
                	<form name="form2" action="" method="post">
                    <div class="row-fluid">
 	                   	<div class="span4" align="center">
                        	<strong>Fecha Inicio</strong><br>
                            <input type="date" name="fechai" value="<?php echo $fechai ?>" autocomplete="off" class="input-large" required>
                        </div>
						<div class="span4" align="center">
                        	<strong>Fecha Final</strong><br>
                            <input type="date" name="fechaf" value="<?php echo $fechaf; ?>" autocomplete="off" class="input-large" required><br>
                            <button type="submit" class="btn"><strong><i class="icon-search"></i> Consultar</strong></button>
                            <a href="reporte_pagos.php" class="btn"><strong>Cancelar</strong></a>
                        </div>
                        <div class="span4" align="center">
                        	<strong>Concepto</strong><br>
                            <select name="concepto" class="input-large">
                            	<option value="OTRO" <?php if($concepto=='OTRO'){ echo 'selected'; } ?>>Otros Pagos</option>
                                <option value="MATRICULA" <?php if($concepto=='MATRICULA'){ echo 'selected'; } ?>>Matricula</option>
                                <option value="Todos" <?php if($concepto=='Todos'){ echo 'selected'; } ?>>Todos</option>
                            </select>
                        </div>
                    </div>
                    </form>
                </td>
              </tr>
            </table>
        	
            <table class="table table-bordered">
                <tr class="success">
                	<td><strong>Nombre del Alumno</strong></td>
                    <td><strong>Fecha</strong></td>
                    <td><strong>Concepto</strong></td>
                    <td><div align="right"><strong>Valor</strong></div></td>
                </tr>
                <?php 
                    $neto=0;
                    if(!empty($_POST['concepto'])){
						if($_POST['concepto']=='Todos'){
							$sql=mysql_query("SELECT * FROM pagos WHERE fecha between '$fechai' AND '$fechaf'");							
						}else{
							$sql=mysql_query("SELECT * FROM pagos WHERE concepto='$concepto' and fecha between '$fechai' AND '$fechaf'");
						}
						while($row=mysql_fetch_array($sql)){
							
							$neto=$neto+$row['valor'];
							$oAlumno = new Consultar_Alumnos($row['alumno']);
                ?>
                <tr>
                	<td><?php echo $oAlumno->consultar('nombre').' '.$oAlumno->consultar('apellido');  ?></td>
                    <td><?php echo fecha($row['fecha']); ?></td>
                    <td><?php echo $row['concepto']; ?></td>
                    <td><div align="right">$ <?php echo number_format($row['valor']); ?></div></td>
                </tr>
                <?php } ?>
                <tr>
                	<td colspan="3"><div align="right"><strong>Total:</strong> </div></td>
                    <td><div align="right">$ <?php echo number_format($neto); ?></div></td>
                </tr>
                <?php } ?>
            </table>
            <?php 
				if($neto<>0){
					$url='fechai='.$fechai.'&fechaf='.$fechaf.'&concepto='.$concepto;
					echo '<center><a href="EXCEL_pagos_todos.php?'.$url.'" class="btn"><i class="icon-list"></i> <strong>Reporte en Excel</strong></a></center>';
				}
			?>
        </td>
      </tr>
    </table>

</div>
</body>
</html>