<?php
 		session_start();
		include_once('php_conexion.php'); 
		
		if($_SESSION['tipo_usu']=='e'){
		}
		else{
			header('location:error.php');
		}
		$usuario=limpiar($_SESSION['username']);
		$sqll=mysql_query("SELECT * FROM usuarios WHERE usu='$usuario'");
		if($dato=mysql_fetch_array($sqll)){
			$nombre=$dato['nom'];
			$palabra=explode(" ", $nombre);
			$nomb=$palabra[0];
		}


// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I.E Atanasio Girardot</title>
    <link rel="stylesheet" href="Css/menu.css">
    <link rel="stylesheet" href="Css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/aa83eb5025.js" crossorigin="anonymous"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
    background-color: #ffffff;
    overflow:hidden;
}

header {
    width: 100%;
    height: 140px;
    font-family: 'Poppins', sans-serif;
    background-color: #fff;
}

.container__header {
    width: 100%;
    height: 100%;
    margin: auto;
}



header .escudo {
    height: 100%;
    display: flex;
    justify-content: left;
    align-items: left;
    padding: 0px 50px;
}

header .logo {
    position: absolute;
    left: 44%;
    top: 0;
    margin: 20px 0;
}


.escudo img {
    width: 140px;
    cursor: pointer;
    transition: all 1s;
}

.escudo img:hover {
    transform: scale(1.07);
}

.logo img {
    width: 220px;
}

.container__nav li {
    text-align: center;
    width: 100%;
}

.container__nav ul {
    list-style: none;
    justify-content: center;
    display: flex;
}

.container__nav a {
    color: #fff;
    display: block;
    text-decoration: none;
    background: #3bc759;
    padding: 15px;
    font-family: 'Jura';
}

.container__nav a:hover {
    background: #116824;
}

@media (max-width:630px){
    .container__nav a{
        display: none;
 }}

.container__nav ul ul {
    display: none;
    width: 20%;
    position: absolute;
}

.container__nav ul li:hover ul {
    display: block;
}

i {
    padding: 0 10px 0 0;
}


/* Edición main - cuerpo de la página */

main .separador {
    padding: 60px 0px;
    display: flex;
}

.separador img {
    width: 100%;
} 

section {
    border: 1px solid red;
    width: 100%;
    height: 500px;
}







/*burguer-menu*/

#Burguer-menu{
    top: -20%;
    left: 95%;
    width: 0%;
    height: 6%;
    background: white;
    cursor: pointer;
    position: relative;
    z-index: 2;
    cursor: pointer;


}




#Burguer-menu span,
#Burguer-menu span:before,
#Burguer-menu span::after{
    
    background: #3bc759;
    display: block;
    height: 9px;
    position: absolute;
    transition: all 300ms ease;
}

#Burguer-menu span:before,
#Burguer-menu span:after{
    content: '';
}

#Burguer-menu span{
    right: 0px;
    top: -45px;
    width: 47px;
    
}
#Burguer-menu span:before{
    left: 0px;
    top: -10px;
    width: 47px;
}

#Burguer-menu span:after{
    left: 0px;
    top: 10px;
    width: 47px;
}
#Burguer-menu.close span{
    transform: rotate(-45deg);
    top: -45px;
    width: 47px;
    background: red;
}

#Burguer-menu.close span:before{
    top: 0px;
    transform: rotate(90deg);
    width: 47px;
    background: red;
}

#Burguer-menu.close span:after{
    top: 0px;
    left: 0px;
    transform: rotate(90deg);
    width: 27px;
    opacity: 0;
}


#menu{
   
    z-index: 1;
    min-width: 100%;
    min-height: 100%;
    position: fixed;
    top: 0px;
    left: 0px;
    opacity: 0;
    text-align: center;
    padding-top: 20px;
    visibility: hidden;
    transition: all 300ms ease;

}
#menu.show{
    opacity: 1;
    visibility: visible;
    padding-top: 200px;
    background: rgba(3, 0, 0, 0.8);
}

#menu li{
width: 100%;
text-align: center;   
}

#menu li:hover{
    letter-spacing: 2px;

}
#menu ul{
    list-style: none;
    justify-content: center;
    display: flex;
}
#menu a {
    display: block;
    text-decoration: none;
    font-family:'jura';
}

#menu ul li img.inicio {
    width: 96%;
    height: 250px;
    cursor: pointer;
    transition: all .2s ease-in-out;
   
    
}

#menu ul li img.inicio:hover{
    transform: scale(1.1);
}

#menu2 ul li img.parte_baja {
    width: 98%;
    height: 450px;
    cursor: pointer;
    transition: all .2s ease-in-out;    
}

#menu2 ul li img.parte_baja:hover{
    transform: scale(0.9);
}

main .fondo img{
    width: 100%;
    height: 80%;
    margin-top: -60px;
}

@media (min-width:930px){
    #Burguer-menu span,
    #Burguer-menu span:before,
    #Burguer-menu span::after{
    background: #09ff00;
    width: 0%;
        
    }

}





.dropdown {
		display:inline;
	position:absolute;
	font-size:1.2rem;
	margin:-70px 0 0 1480px;
	font-family: "Comic Sans MS", cursive;
	}

</style>

    
    <header>
        <div class="container__header">
            <div class="escudo">
                <img src="alumnoindex/escudo.png" alt="Escudo Atanasio Girardot">
            </div>

            <div class="logo">
                <img src="alumnoindex/logo.png"alt="Logo Girardot Aprende">
            </div>
 <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown">
        <i class="icon-user"></i> Buen dia! <?php echo $nomb; ?> <b class="caret"></b> </li> </u>
            <nav class="container__nav">
            
                <ul>
 
               
                    <li><a href="#"><i class="fa-solid fa-house"></i>TUS PROFESORES</a></li>
                    <li><a href="#"><i class="fa-sharp fa-solid fa-newspaper"></i></i>NOTAS</a></li>
                    <li><a href="#"><i class="fa-solid fa-people-line"></i>OFICINA VIRTUAL</a>
                        <ul class="sub-menu">
                            <li><a href="#"><i class="fa-solid fa-book"></i>CERTIFICADOS</a></li>
                            <li><a href="#"><i class="fa-sharp fa-solid fa-puzzle-piece"></i>SOLICITUD RECTORIA</a></li>
                            <li><a href="#"><i class="fa-solid fa-location-dot"></i>SOLICITUD PSICOLOGIA</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa-sharp fa-solid fa-right-to-bracket"></i>CRONOGRAMA</a></li>
                    
                    <li><i class="fa-sharp fa-solid fa-right-to-bracket"><a href="php_cerrar.php">Cerrar Sesión</a></i></li>
                </ul>
            </nav>
        </div>

        <!--burguer-menu-->
        <div id="Burguer-menu">
            <span></span>
           </div>

           <div id="menu">
            
            <ul>
                <li><a href="#" ><img class="inicio" src="alumnoindex/inicio2.jpg" ></a></li>
                <li><a href="#" ><img class="inicio" src="alumnoindex/matriculas.png" ></a></li>
                <li><a href="#" ><img class="inicio" src="alumnoindex/historia.jpg"  ></a></li>
                <li><a href="#" ><img class="inicio" src="alumnoindex/mision y vision.jpg" ></a></li>
            </ul>

            <div id="menu2">
            <ul>
                <li><a href="#" ><img class="parte_baja" src="alumnoindex/inicio2.jpg"></a></li>
                <li><a href="#" ><img class="parte_baja" src="alumnoindex/matriculas.png" ></a></li>
                
            </ul>
        </div>


    </header>
    <body>
    
    <main>
        <div class="separador">
            <img src="alumnoindex/banner.svg" alt="Barra de separación">
        </div>

        <div class="fondo">
            <img src="alumnoindex/colegio.png" alt="fondo">
        </div>
        </main>

        <script src="Js/main.js"></script>
    <script src="alumnoindex/app.js"></script>
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
    
</body>
</html>