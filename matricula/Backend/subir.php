<?php
include('conexion.php');

if(isset($_POST['Guardar'])){
    $imagen = $_FILES['imagen']['name'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];

    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'jpg') || strpos($tipo,'png')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp, jpg, png';
          $_SESSION['tipo'] = 'danger';
          header('location:../noticias.php');
       }else{
         $query = "INSERT INTO noticias(imagen,titulo,descripcion,fecha) values('$imagen','$titulo','$descripcion',' $fecha')";
         $resultado = mysqli_query($conn,$query);
         if($resultado){
              move_uploaded_file($temp,'imagenes/'.$imagen);   
             $_SESSION['mensaje'] = 'se ha subido correctamente';
             $_SESSION['tipo'] = 'success';
             header('location:../noticias.php');
         }else{
             $_SESSION['mensaje'] = 'ocurrio un error en el servidor';
             $_SESSION['tipo'] = 'danger';
         }
       }
    }
}


?>