<?php
 		session_start();
		include_once('php_conexion.php'); 
		include_once('Class/funciones.php'); 
		include_once('Class/class_alumnos.php');
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header('location:error.php');
		}
		if(!empty($_GET['estado'])){
			$nit=limpiar($_GET['estado']);
			$cans=mysql_query("SELECT * FROM alumnos WHERE estado='s' and id='$nit'");
			if($dat=mysql_fetch_array($cans)){
				$xSQL="Update alumnos Set estado='n' Where id='$nit'";
				mysql_query($xSQL);
				header('location:alumnos.php');
			}else{
				$xSQL="Update alumnos Set estado='s' Where id='$nit'";
				mysql_query($xSQL);
				header('location:alumnos.php');
			}
		}
		
		#paginar
		$maximo=5;
		if(!empty($_GET['pag'])){
			$pag=limpiar($_GET['pag']);
		}else{
			$pag=1;
		}
		$inicio=($pag-1)*$maximo;
		
			$cans=mysql_query("SELECT COUNT(nombre)as total FROM alumnos");
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
    <table width="95%" border="0">
      <tr>
        <td>
       	  <table class="table table-bordered">
              <tr class="success">
                <td>
                    <div class="row-fluid">
                      <div class="span6">
                        	<h3><img src="img/icono_alumno.jpg" class="img-circle img-polaroid" width="70" height="65"> 
                        	Registro & Control de Alumnos</h3>
                      </div>
                      <div class="span6">
                      	<div align="right">
                       	<a href="crear_alumno.php" class="btn">
                            	<strong><i class="icon-user"></i> Ingresar Nuevo</strong>
                        </a>
                        <div class="btn-group">
                            <button class="btn" data-toggle="dropdown">
                            	<i class="icon-search"></i> <strong>Consultar por Cursos</strong> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <?php
									$c=mysql_query("SELECT * FROM salones WHERE estado='s'");
									while($d=mysql_fetch_array($c)){
										echo '<li><a href="alumnos.php?cursos='.$d['id'].'">'.$d['nombre'].'</a></li>';	
									}
							?>
                            <li><a href="alumnos.php?cursos=0">Todos</a></li>
                            </ul>
                        </div>
                        <br><br>
                        <form name="form1" method="post" action="">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input name="bus" type="text" placeholder="Buscar Alumno" class="input-xlarge" autocomplete="off">
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
				if(!empty($_POST['nombre']) and !empty($_POST['apellido'])){
					$nombre=limpiar($_POST['nombre']);			$apellido=limpiar($_POST['apellido']);
					$nit=limpiar($_POST['nit']);				$telefono=limpiar($_POST['telefono']);
					$fechan=limpiar($_POST['fechan']);			$folio=limpiar($_POST['folio']);
					$curso=limpiar($_POST['curso']);
					
					if(empty($_POST['id'])){
						$c_alumno = new Proceso_Alumnos($nombre,$apellido,$nit,$telefono,$fechan,$folio,$curso,'s','');
						$c_alumno->crear();
						
						$can=mysql_query("SELECT MAX(id)as maximo FROM alumnos");
						if($dato=mysql_fetch_array($can)){
							$codigo=$dato['maximo'];
							//subir la imagen del articulo
							$nameimagen = $_FILES['imagen']['name'];
							$tmpimagen = $_FILES['imagen']['tmp_name'];
							$extimagen = pathinfo($nameimagen);
							$urlnueva = "alumnos/".$codigo.".jpg";			
							if(is_uploaded_file($tmpimagen)){
								copy($tmpimagen,$urlnueva);	
							}
						}
						echo '	<div class="alert alert-info" align="center">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>
										El alumno/a "'.$nombre.' '.$apellido.'" Registrado con Exito en la Base de Datos							
									</strong>
								</div>';
								
					}elseif(!empty($_POST['id'])){
						$codigo=$_POST['id'];
						$a_alumno = new Proceso_Alumnos($nombre,$apellido,$nit,$telefono,$fechan,$folio,$curso,'s',$codigo);
						$a_alumno->actualizar();
												
						//subir la imagen del articulo
						$nameimagen = $_FILES['imagen']['name'];
						$tmpimagen = $_FILES['imagen']['tmp_name'];
						$extimagen = pathinfo($nameimagen);
						$urlnueva = "alumnos/".$codigo.".jpg";			
						if(is_uploaded_file($tmpimagen)){
							copy($tmpimagen,$urlnueva);	
						}
						echo '	<div class="alert alert-info" align="center">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>
										El alumno/a "'.$nombre.' '.$apellido.'" Actualizado con Exito en la Base de Datos							
									</strong>
								</div>';
					}
					
				}
			?>
        	<table class="table table-bordered table table-hover">
              <tr class="success">
                <td width="27%"><strong>Apellido y Nombre</strong></td>
                <td width="19%"><center><strong>Telefono</strong></center></td>
                <td width="14%"><center><strong>Estado</strong></center></td>
                <td width="32%"><center><strong>Curso / Salon</strong></center></td>
             

              </tr>
              <?php
			  	if(empty($_GET['cursos'])){
					if(empty($_POST['bus'])){
						$sql="SELECT * FROM alumnos ORDER BY apellido LIMIT $inicio, $maximo";
					}else{
						$bus=limpiar($_POST['bus']);
						$sql="SELECT * FROM alumnos WHERE nombre LIKE '$bus%' or apellido LIKE '$bus%' or nit='$bus' ORDER BY apellido LIMIT $inicio, $maximo";
					}
				}else{
					$bus=limpiar($_GET['cursos']);
					if($bus<>0){
						$sql="SELECT * FROM alumnos WHERE curso='$bus' ORDER BY apellido LIMIT $inicio, $maximo";
					}else{
						$sql="SELECT * FROM alumnos ORDER BY apellido LIMIT $inicio, $maximo";
					}
				}
			  	
			  	$can=mysql_query($sql);
				while($dato=mysql_fetch_array($can)){	
					$salones = new Consultar_Salones($dato['curso']);
			  ?>
                  <tr>
                    <td><i class="icon-user"></i> <?php echo trim($dato['apellido']).' '.trim($dato['nombre']); ?></td>
                    <td><center><?php echo $dato['telefono']; ?></center></td>
                    <td>
                    	<center>
                        <a href="alumnos.php?estado=<?php echo $dato['id']; ?>" title="Cambiar Estado">
							<?php echo estado($dato['estado']); ?>
                        </a>
                        </center>
                    </td>
                    <td><center><?php echo $salones->consultar('nombre'); ?></center></td>
                    <td>
                    	<a href="crear_alumno.php?doc=<?php echo $dato['nit']; ?>" class="btn btn-mini" title="Actualizar Informacion">
                    		<i class="icon-edit"></i>
                        </a>
                    </td>
                     <td><center>
        	<a href="#eliminar.php<?php echo $dato['id']; ?>" role="button" class="btn btn-mini" data-toggle="modal" title="Eliminar alumno">
            	<i class="icon-edit"></i>
            </a>
            </center></td>
                  </tr>
                 
                  
                  
                  <!--actualizar alumno-->
                    <div id="actualizar<?php echo $dato['id']; ?>" 
                    class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form name="form2" method="post" enctype="multipart/form-data" action="">
                    	<input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Actualizar Alumno</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row-fluid">
                                <div class="span6">
                                    <strong>Nombre del Alumno</strong><br>
                                    <input type="text" name="nombre" autocomplete="off" required value="<?php echo $dato['nombre']; ?>"><br>
                                    <strong>Codigo o Nit</strong><br>
                                  	<input type="text" name="nit" autocomplete="off" required value="<?php echo $dato['nit']; ?>"><br>
                                    <strong>Fecha Nacimiento</strong><br>
                                    <input type="date" name="fechan" autocomplete="off" required value="<?php echo $dato['fechan']; ?>"><br>
                                    <strong>Curso / Salon</strong><br>
                                    <select name="curso">
                                    	<?php
											$c=mysql_query("SELECT * FROM salones WHERE estado='s'");
											while($d=mysql_fetch_array($c)){
												if($d['id']==$dato['curso']){	
													echo '<option value="'.$d['id'].'" selected>'.$d['nombre'].'</option>';
												}else{
													echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
												}
											}
										?>
                                        
                                    </select>
                                    <strong>Fotografia</strong><br>
                                    <input type="file" name="imagen" id="imagen">
                                </div>
                                <div class="span6">
                                    <strong>Apellidos del Alumno</strong><br>
                                    <input type="text" name="apellido" autocomplete="off" value="<?php echo $dato['apellido']; ?>"><br>
                                    <strong>Telefonos / Celulares</strong><br>
                                    <input type="text" name="telefono" autocomplete="off" value="<?php echo $dato['telefono']; ?>"><br>
                                    <strong>No. De Carpetas / Folio</strong><br>
                                    <input type="text" name="folio" autocomplete="off" value="<?php echo $dato['folio']; ?>"><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
                            <button type="submit" class="btn"><strong><i class="icon-ok"></i> Actualizar Alumno</strong></button>
                        </div>
                        </form>
                    </div>
              <?php } ?>
            </table>
			<?php 
				$can=mysql_query($sql);
				if(!$dato=mysql_fetch_array($can)){				
					echo '<div class="alert alert-info" align="center"><strong>No hay Alumnos Registrados en la BD</strong></div>';
				}
			?>
        </td>
      </tr>
    </table>
    <div class="pagination">
        <ul>
        	<?php
			if(empty($_GET['cursos']) and empty($_POST['bus'])){
				$tp = ceil($total/$maximo);#funcion que devuelve entero redondeado
         		for	($n=1; $n<=$tp ; $n++){
					if($pag==$n){
						echo '<li class="active"><a href="alumnos.php?pag='.$n.'">'.$n.'</a></li>';	
					}else{
						echo '<li><a href="alumnos.php?pag='.$n.'">'.$n.'</a></li>';	
					}
				}
				
			}
			?>
        </ul>
    </div>
</div>
<!--crear nuevo alumno-->
<div id="nuevo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form name="form2" method="post" enctype="multipart/form-data" action="">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Ingresar Nuevo Alumno</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
        	<div class="span6">
            	<strong>Nombre del Alumno</strong><br>
            	<input type="text" name="nombre" autocomplete="off" required><br>
                <strong>Codigo o Nit</strong><br>
              <input type="text" name="nit" autocomplete="off" required><br>
                <strong>Fecha Nacimiento</strong><br>
                <input type="date" name="fechan" autocomplete="off" required value="<?php echo date('Y-m-d'); ?>"><br>
                <strong>Curso / Salon</strong><br>
                <select name="curso">
                	<?php
						$c=mysql_query("SELECT * FROM salones WHERE estado='s'");
						while($d=mysql_fetch_array($c)){
							echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
						}
					?>
                </select>
                <strong>Fotografia</strong><br>
                <input type="file" name="imagen" id="imagen">
            </div>
            <div class="span6">
            	<strong>Apellidos del Alumno</strong><br>
                <input type="text" name="apellido" autocomplete="off"><br>
                <strong>Telefonos / Celulares</strong><br>
                <input type="text" name="telefono" autocomplete="off"><br>
                <strong>No. De Carpetas / Folio</strong><br>
                <input type="text" name="folio" autocomplete="off"><br><br>                
            </div>
		</div>
	</div>
  	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
        <button type="submit" class="btn"><strong><i class="icon-ok"></i> Ingresar Alumno</strong></button>
	</div>
    </form>
</div>
</body>
</html>