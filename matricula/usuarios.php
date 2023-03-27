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
	<table width="90%">
      <tr>
        <td>
        
        	<table class="table table-bordered">
              <tr class="success">
                <td>
                	<center>
                    	<h2>Administrador de Usuarios</h2>
                		<a href="#nuevo" role="button" class="btn" data-toggle="modal">
                        	<strong><i class="icon-plus"></i> Ingresar Nuevo Usuario</strong>
                        </a>
                    </center>
              	</td>
              </tr>
            </table>
        	<?php 
				if(!empty($_POST['ced'])){
					$ced=limpiar($_POST['ced']);		$nom=limpiar($_POST['nom']);
					$usu=limpiar($_POST['usu']);		$tipo=limpiar($_POST['tipo']);
					$estado=limpiar($_POST['estado']);	$con=limpiar($_POST['usu']);
					
					if($_POST['proceso']=='actualizar'){
						mysql_query("UPDATE usuarios SET estado='$estado', nom='$nom', tipo='$tipo'	where usu='$usu'");
						echo mensajes("El usuario ha sido Actualizado con Exito","verde");	
					}elseif($_POST['proceso']=='guardar'){
						if (preg_match("/\\s/", $usu)){ 
							echo mensajes('No se permiten espacios en la cuenta de usuario','rojo');
						}else{
							mysql_query("INSERT INTO usuarios (ced,estado,nom,usu,con,tipo) 
							VALUES ('$ced','$estado','$nom','$usu','$con','$tipo')");
							echo mensajes("El usuario ha sido Registrado con Exito","verde");
						}
					}
				}
			?>
            <table class="table table-bordered">
            	<tr class="success">
                    <td><strong>Documento</strong></td>
                    <td><strong>Nombre</strong></td>
                    <td><strong>Usuario</strong></td>
                    <td><strong><center>Estado</center></strong></td>
                    <td><strong><center>Tipo</center></strong></td>
                    <td><strong></strong></td>
              	</tr>
                <?php 
					$sql=mysql_query("SELECT * FROM usuarios");
					while($row=mysql_fetch_array($sql)){
						if($row['tipo']=='a'){
							$tipo='Administrado';
						}else{
							$tipo='Usuario';	
						}
				?>
                <tr>
                    <td><?php echo $row['ced']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['usu']; ?></td>
                    <td><center><?php echo estado($row['estado']); ?></center></td>
                    <td><center><?php echo $tipo; ?></center></td>
                    <td>
                    	<center>
                        	<a href="#u<?php echo $row['usu']; ?>" role="button" class="btn btn-mini" data-toggle="modal">
                            	<i class="icon-edit"></i>
                            </a>
                        </center>
                    </td>
              	</tr>
                
                <div id="u<?php echo $row['usu']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form name="fo<?php echo $row['usu']; ?>" action="" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel" align="center">Actualizar Usuario <?php echo $row['nom']; ?></h3>
                    </div>
                    <div class="modal-body" align="center">
                    	<input type="hidden" name="proceso" value="actualizar">
                        <strong>Documento</strong><br>
                        <input type="text" name="ced" autocomplete="off" readonly class="input-large" value="<?php echo $row['ced']; ?>"><br>
                        <strong>Nombre Completo</strong><br>
                        <input type="text" name="nom" autocomplete="off" required class="input-large" value="<?php echo $row['nom']; ?>"><br>
                        <strong>Usuario</strong><br>
                        <input type="text" name="usu" autocomplete="off" readonly class="input-large" value="<?php echo $row['usu']; ?>"><br>
                        <strong>Estado</strong><br>
                        <select name="estado" class="input-large">
                            <option value="s" <?php if($row['estado']=='s'){ echo 'selected';} ?>>Activo</option>
                            <option value="n" <?php if($row['estado']=='n'){ echo 'selected';} ?>>No Activo</option>
                        </select><br>
                        <strong>Tipo de Usuario</strong><br>
                        <select name="tipo" class="input-large">
                            <option value="a" <?php if($row['tipo']=='a'){ echo 'selected';} ?>>Administrador</option>
                            <option value="u" <?php if($row['tipo']=='s'){ echo 'selected';} ?>>Usuario</option>
                        </select><br>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
                        <button type="submit" class="btn btn-primary"><strong>Crear Usuario</strong></button>
                    </div>
                    </form>
                </div>
                
                <?php } ?>
            </table>
        </td>
      </tr>
    </table>
    
    <div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<form name="fo" action="" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Crear Usuario</h3>
        </div>
        <div class="modal-body">
        	<input type="hidden" name="proceso" value="guardar">
            <strong>Documento</strong><br>
            <input type="text" name="ced" autocomplete="off" required class="input-large" value=""><br>
            <strong>Nombre Completo</strong><br>
            <input type="text" name="nom" autocomplete="off" required class="input-large" value=""><br>
            <strong>Usuario</strong><br>
            <input type="text" name="usu" autocomplete="off" required class="input-large" value=""><br>
            <strong>Estado</strong><br>
            <select name="estado" class="input-large">
            	<option value="s">Activo</option>
                <option value="n">No Activo</option>
            </select><br>
            <strong>Tipo de Usuario</strong><br>
            <select name="tipo" class="input-large">
            	<option value="a">Administrador</option>
                <option value="u">Usuario</option>
            </select><br>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Cerrar</strong></button>
            <button type="submit" class="btn btn-primary"><strong>Crear Usuario</strong></button>
        </div>
        </form>
    </div>
</div>
</body>
</html>