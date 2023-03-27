<?php
include('Backend/conexion.php');
$query = "select * from noticias";
$resultado = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Noticias</title>
</head>

<body>

    <div class="blog-section">
        <div class="row">
            <div class="title">
                <img src="Images/title_noticias.svg" alt="" width="567" height="37">
            </div>
            <div class="home"> <a href="invi.php"> <img src="Images/5929221_building_estate_home_house_property_icon.svg" alt="" srcset=""></a></div>
           
            <div class="cards">
            <?php foreach ($resultado as $row) { ?>
                <div class="card">
                   
                        <div class="img-section">
                            <img src="Backend/imagenes/<?php echo $row['imagen']; ?>" alt="">
                        </div>
                        <div class="article">
                            <h4><strong><?php echo $row['titulo']; ?> </strong></h4>
                            <p><strong><?php echo $row['descripcion']; ?></strong></p>
                        </div>
                        <div class="posted-date">
                            <p><strong><?php echo $row['fecha']; ?></strong></p>
                        </div>
                               
                </div>


                <?php } ?>
              
                
                </div>
              
        </div>
       
    </div>
         
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>