<!-- 
<?php
		session_start();
		include_once('php_conexion.php'); 
		
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=limpiar($_POST['usuario']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
			if($dato=mysql_fetch_array($can)){
				if($dato['estado']=='s'){
					$_SESSION['username']=$dato['usu'];
					$_SESSION['tipo_usu']=$dato['tipo'];
					
					///////////////////////////////
					if($_SESSION['tipo_usu']=='a'){						
						header('location:Administrador.php');
				
					}
					if($_SESSION['tipo_usu']=='e'){						
						header('location:indexalumno.php');
				
					}
					if($_SESSION['tipo_usu']=='d'){						
						header('location:docentes.php');
				
					}
					}
				}
			}
?> -->

<!DOCTYPE html>
<html>
<head>
	<title>Ingreso </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/stylos.css">
	<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	<div class="container">
		<div class="img">
			<img src="ima/2.svg">
		</div>
		<div class="login-content">
			 <form name="form1" method="post" action="" class="form-signin">
				<h2 class="titulo">ATANASIO GIRARDOT</h2>
				<img src="ima/escudo.png">
				<h2 class="title">INICIO DE USUARIO </h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
           		   		  <input type="text" name="usuario" class="input" placeholder="Documento"autocomplete="off"  >
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    
           		    	 <input type="password" name="contra" class="input" placeholder="Contraseña" autocomplete="off">
            	   </div>

            	</div>
				
            
            	  <button class="btn" type="submit">Iniciar</button>
                  
				<!-- <?php
		$act="1";
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=limpiar($_POST['usuario']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
			if(!$dato=mysql_fetch_array($can)){
				if($act=="1"){
					echo '<div class="alert alert-error" align="center"><strong>Usuario y Contraseña Incorrecta</strong></div>';
				}else{
					$act="0";
				}
			}else{
				if($dato['estado']=='n'){
					echo '<div class="alert alert-error" align="center"><strong>Consulte con el Administrador</strong></div>';
				}
			}
		}else{
			
		}
	?> -->
            </form>
        </div>
    </div>
  
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
</body>
</html>



