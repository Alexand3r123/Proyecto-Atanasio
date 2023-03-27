<?php
 		session_start();
		include_once('php_conexion.php'); 
		include_once('Class/funciones.php'); 
		include_once('Class/class_alumnos.php');
		if($_SESSION['tipo_usu']=='a' ){
		}else{
			header('location:error.php');
		}
		
		#estado
		if(!empty($_GET['estado'])){
			$nit=limpiar($_GET['estado']);
			$cans=mysql_query("SELECT * FROM salones WHERE estado='s' and id='$nit'");
			if($dat=mysql_fetch_array($cans)){
				$xSQL="Update salones Set estado='n' Where id='$nit'";
				mysql_query($xSQL);
				header('location:salones.php');
			}else{
				$xSQL="Update salones Set estado='s' Where id='$nit'";
				mysql_query($xSQL);
				header('location:salones.php');
			}
		}
		
		#paginar
		$maximo=6;
		if(!empty($_GET['pag'])){
			$pag=limpiar($_GET['pag']);
		}else{
			$pag=1;
		}
		$inicio=($pag-1)*$maximo;
		
		$cans=mysql_query("SELECT COUNT(nombre)as total FROM salones");
		if($dat=mysql_fetch_array($cans)){
			$total=$dat['total']; #inicializo la variable en 0
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
                	<h3><img src="img/curso.jpg" class="img-circle img-polaroid" width="70" height="65"> 
                        	Registro & Control de Salones / Cursos</h3>
                </div>
    	        <div class="span6">
                	<div align="right">
                	<div class="btn-group">
                    	<a href="#nuevo" role="button" class="btn" data-toggle="modal">
                            	<strong><i class="icon-user"></i> Ingresar Nuevo</strong>
                        </a> 
                    	<button class="btn" data-toggle="dropdown">
                        	<i class="icon-search"></i> <strong>Ordenar por Cursos</strong> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <?php
							$c=mysql_query("SELECT * FROM salones GROUP BY curso");
							while($d=mysql_fetch_array($c)){
								echo '<li><a href="salones.php?cursos='.$d['curso'].'">'.$d['curso'].'</a></li>';	
							}
						?>
                        <li><a href="salones.php?cursos=0">Todos</a></li>
                        </ul>
                    </div><br><br>
                	<form name="form1" method="post" action="">
                    	<div class="input-prepend">
                        	<span class="add-on"><i class="icon-search"></i></span>
                            <input name="bus" type="text" placeholder="Buscar Salones" class="input-xlarge" autocomplete="off" autofocus>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </td>
      </tr>
    </table>
    
    </td>
  </tr>
  <tr>
    <td>
    <?php 
		if(!empty($_POST['nombre']) and !empty($_POST['curso'])){
			$nombre=limpiar($_POST['nombre']);
			$curso=limpiar($_POST['curso']);
			
			if(empty($_POST['id'])){
				$c_curso = new Proceso_Salones($nombre,$curso,'');
				$c_curso->crear();
				echo '	<div class="alert alert-info" align="center">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>
								El Curso / Salon "'.$nombre.'" Registrado con Exito en la Base de Datos							
							</strong>
						</div>';
			}else{
				$id=limpiar($_POST['id']);
				$c_curso = new Proceso_Salones($nombre,$curso,$id);
				$c_curso->actualizar();
				echo '	<div class="alert alert-info" align="center">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>
								El Curso / Salon "'.$nombre.'" Actualizado con Exito en la Base de Datos							
							</strong>
						</div>';
			}
		}
	?>
    <table class="table table-bordered table table-hover">
      <tr class="success">
        <td><strong>Nombre del Salon</strong></td>
        <td><strong>Descripcion del Salon</strong></td>
        <td><center><strong>Estado</strong></center></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php
	  	if(empty($_GET['cursos'])){
			if(empty($_POST['bus'])){
				$sql="SELECT * FROM salones ORDER BY nombre LIMIT $inicio, $maximo";
			}else{
				$bus=limpiar($_POST['bus']);
				$sql="SELECT * FROM salones WHERE nombre LIKE '%$bus%' ORDER BY nombre LIMIT $inicio, $maximo";
			}
	 	}else{
			$bus=limpiar($_GET['cursos']);
			$sql="SELECT * FROM salones WHERE curso='$bus' ORDER BY nombre LIMIT $inicio, $maximo";
		}
			  	
		$can=mysql_query($sql);
		while($dato=mysql_fetch_array($can)){	
	?>
      <tr>
        <td><i class="icon-folder-open"></i> <?php echo $dato['nombre']; ?></td>
        <td><?php echo $dato['curso']; ?></td>
        <td>
        	<center>
                <a href="salones.php?estado=<?php echo $dato['id']; ?>" title="Cambiar Estado">
                    <?php echo estado($dato['estado']); ?>
                </a>
            </center>
        </td>
        <td>
        	<center>
        	<a href="#actualizar<?php echo $dato['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal" title="Actualizar Informacion">
            	<i class="icon-edit"></i>
            </a>
            </center>
        </td>
        <td><center>
        	<a href="#eliminar<?php echo $dato['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar Salon">
            	<i class="icon-edit"></i>
            </a>
           </td>
      </tr>
       <div id="actualizar<?php echo $dato['id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<form name="form2" method="post" action="">
        	<input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
       	 	<h3 id="myModalLabel">Crear Nuevo Curso</h3>
        </div>
        <div class="modal-body">
        	<strong>Nombre del Salon</strong><br>
            <input type="text" name="nombre" autocomplete="off" required value="<?php echo $dato['nombre']; ?>"><br>
            <strong>Nombre del Curso</strong><br>
            <input type="text" name="curso" list="characters" autocomplete="off" required value="<?php echo $dato['curso']; ?>">
          	<datalist id="characters">
            <?php 
			  	$c=mysql_query("SELECT nombre FROM salones ORDER BY nombre");
				while($d=mysql_fetch_array($c)){
					echo '<option value="'.$d['nombre'].'">';
				}
			?>
         	</datalist>
            <br>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
            <button type="submit" class="btn btn-primary"><strong><i class="icon-ok"></i> Actualizar Salon</strong></button>
        </div>
        </form>
    </div>
      <?php } ?>
    </table>
    <center>
	<div class="pagination">
        <ul>
        	<?php
			if(empty($_GET['cursos']) and empty($_POST['bus'])){
				$tp = ceil($total/$maximo);#funcion que devuelve entero redondeado
         		for	($n=1; $n<=$tp ; $n++){
					if($pag==$n){
						echo '<li class="active"><a href="salones.php?pag='.$n.'">'.$n.'</a></li>';	
					}else{
						echo '<li><a href="salones.php?pag='.$n.'">'.$n.'</a></li>';	
					}
				}
				
			}
			?>
        </ul>
    </div>  
    </center>  
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
    <div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<form name="form2" method="post" action="">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
       	 	<h3 id="myModalLabel">Crear Nuevo Curso</h3>
        </div>
        <div class="modal-body">
        	<strong>Nombre del Salon</strong><br>
            <input type="text" name="nombre" autocomplete="off" required><br>
            <strong>Nombre del Curso</strong><br>
            <input type="text" name="curso" list="characters" autocomplete="off" required>
          	<datalist id="characters">
            <?php 
			  	$can=mysql_query("SELECT nombre FROM salones ORDER BY nombre");
				while($dato=mysql_fetch_array($can)){
					echo '<option value="'.$dato['nombre'].'">';
				}
			?>
         	</datalist>
            <br>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
            <button type="submit" class="btn btn-primary"><strong><i class="icon-ok"></i> Guardar Salon</strong></button>
        </div>
        </form>
    </div>
</div>
</body>
</html>