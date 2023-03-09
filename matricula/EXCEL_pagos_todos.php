<?php
 		session_start();
	include_once('php_conexion.php'); 
	include_once('Class/funciones.php'); 
	include_once('Class/class_alumnos.php');
	
	if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
	}else{
		header('location:error.php');
	}
	
	if(!empty($_GET['fechaf']) and !empty($_GET['fechai']) and !empty($_GET['concepto'])){
		$fechai=limpiar($_GET['fechai']);
		$fechaf=limpiar($_GET['fechaf']);
		$concepto=limpiar($_GET['concepto']);	
	}
	
	header("Content-Disposition: attachment; filename=Pagos_Alumno_concepto.xls"); 
	header("Pragma: no-cache");	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reporte Pagos Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles 
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
    <script src="js/application.js"></script>-->

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
	<table width="100%" border="1">
    	<tr>
            <td colspan="8"><center><strong><?php echo $concepto.' | Fecha Inicio: '.fecha($fechai).' | Fecha Final'.fecha($fechaf); ?></strong></center></td>
        </tr>
        <tr>
        	<td><strong>Nombre del Alumno</strong></td>
            <td><strong>Nit</strong></td>
            <td><strong>Fecha</strong></td>
            <td><strong>Barrio</strong></td>
            <td><strong>Estado</strong></td>
            <td><strong>Salon</strong></td>
            <td><strong>Folio</strong></td>
            <td><strong>Concepto</strong></td>
            <td><div align="right"><strong>Valor</strong></div></td>
        </tr>
        <?php 
            $neto=0;
            if($_GET['concepto']=='Todos'){
				$sql=mysql_query("SELECT * FROM pagos WHERE fecha between '$fechai' AND '$fechaf'");							
			}else{
				$sql=mysql_query("SELECT * FROM pagos WHERE concepto='$concepto' and fecha between '$fechai' AND '$fechaf'");
			}
            while($row=mysql_fetch_array($sql)){
                $neto=$neto+$row['valor'];
				$oAlumno = new Consultar_Alumnos($row['alumno']);
				$oSalon = new Consultar_Salones($oAlumno->consultar('curso'));
        ?>
        <tr>
           	<td><?php echo $oAlumno->consultar('nombre').' '.$oAlumno->consultar('apellido');  ?></td>
            <td><?php echo $row['alumno']; ?></td>
            <td><?php echo fecha($row['fecha']); ?></td>
            <td><?php echo $oAlumno->consultar('barrio'); ?></td>
            <td><?php echo estado($oAlumno->consultar('estado')); ?></td>
            <td><?php echo $oSalon->consultar('nombre'); ?></td>
            <td><?php echo $oAlumno->consultar('folio'); ?></td>
            <td><?php echo $row['concepto']; ?></td>
            <td><div align="right">$ <?php echo number_format($row['valor']); ?></div></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="8"></td>
            <td><div align="right">$ <?php echo number_format($neto); ?></div></td>
        </tr>
    </table>
</body>
</html>