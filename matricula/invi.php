

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I.E Atanasio Girardot</title>
    <link rel="stylesheet" href="css/stylos.css">
    <script src="https://kit.fontawesome.com/6a498da694.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Navegación -->
    <header id="inicio">
        <div class="escudo">
            <img src="Images/escudo.png" alt="Escudo Atanasio Girardot">
        </div>

        <div class="logo">
            <img src="Images/logo.png" alt="Logo Girardot Aprende">
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark text-white">

        <div class="container">
            <a href="#" class="navbar-brand">I.E ATANASIO <span class="text-dark">GIRARDOT</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarS" aria-controls="navbarS" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarS">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="#inicio" class="nav-link"><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <li class="nav-item"><a href="#noticias" class="nav-link"><i class="fa-solid fa-newspaper"></i>Noticias</a></li>
                    <li class="nav-item"><a href="#contacto" class="nav-link"><i class="fa-regular fa-id-badge"></i>Matriculas</a></li>
                    <li class="nav-item"><a href="#historia" class="nav-link"><i class="fa-solid fa-users-line"></i>Quienes Somos</a></li>
                    <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa-regular fa-user"></i>Ingresar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cuerpo de la página 
        Carrusel de Imagenes
    -->

    <div id="carouselE" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
            </button>
            <!-- Button 2-->
            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="1" aria-current="true" aria-label="Slide 2">
            </button>
            <!-- Button 3-->
            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="2" aria-current="true" aria-label="Slide 3">
            </button>
            <!-- Button 2-->
            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="3" aria-current="true" aria-label="Slide 4">
            </button>
        </div>

        <div class="carousel-inner">
            <!-- Item 1-->
            <div class="carousel-item active">
                <img src="Images/colegio1.jpg" alt="" class="d-block w-100">
                <div class="carousel-caption">
                    <h5>Institución Educativa Atanasio Girardot</h5>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti architecto molestiae quis impedit, quae sequi asperiores maiores culpa in eius earum facere at molestias numquam iure, cum, quos nemo ducimus.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Más Información</a>
                </div>
            </div>

            <!-- Item 2-->
            <div class="carousel-item ">
                <img src="Images/Colegio2.jpg" alt="" class="d-block w-100">
                <div class="carousel-caption">
                    <h5>Institución Educativa Atanasio Girardot</h5>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti architecto molestiae quis impedit, quae sequi asperiores maiores culpa in eius earum facere at molestias numquam iure, cum, quos nemo ducimus.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Más Información</a>
                </div>
            </div>

            <!-- Item 3-->
            <div class="carousel-item ">
                <img src="Images/Colegio3.jpg" alt="" class="d-block w-100">
                <div class="carousel-caption">
                    <h5>Institución Educativa Atanasio Girardot</h5>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti architecto molestiae quis impedit, quae sequi asperiores maiores culpa in eius earum facere at molestias numquam iure, cum, quos nemo ducimus.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Más Información</a>
                </div>
            </div>

            <!-- Item 4-->
            <div class="carousel-item ">
                <img src="Images/Colegio4.jpg" alt="" class="d-block w-100">
                <div class="carousel-caption">
                    <h5>Institución Educativa Atanasio Girardot</h5>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti architecto molestiae quis impedit, quae sequi asperiores maiores culpa in eius earum facere at molestias numquam iure, cum, quos nemo ducimus.
                    </p>
                    <a href="#" class="btn btn-primary mt-3">Más Información</a>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselE" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselE" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Noticias Girardot -->

    <section id="noticias">


        <div class="separador2">
            <img src="Images/banner.svg" alt="Barra de separación">
        </div>


        <div class="blog-section">
            <div class="row">
                <div class="title">
                    <img src="Images/title_noticias.svg" alt="">
                </div>
                <div class="cards">
                    <div class="card">
                        <div class="img-section">
                            <img src="Images/Noticia1.jpg" alt="">
                        </div>
                        <div class="article">
                            <h4>Title</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nemo vero suscipit dignissimos quam iure, rerum odio ipsa et deleniti nobis nisi laborum placeat consectetur in quibusdam quae, est ad?
                            Sit architecto magnam perspiciatis nemo tenetur mollitia, at dolor consequuntur doloremque illum non, expedita dolore maxime ea aperiam illo? Repellendus natus tempore iusto illum sapiente alias reprehenderit voluptatem molestiae accusantium.</p>
                        </div>
                        <div class="blog-view">
                        <a href="public_noticias.php" class="button" target="_blank">Leer más</a>
                        </div>
                        <div class="posted-date">
                            <p>Publicación 1 de noviembre del 2022</p>
                        </div>
                    </div>
  
                    <div class="card">
                        <div class="img-section">
                            <img src="Images/Noticia2.jpg" alt="">
                        </div>
                        <div class="article">
                            <h4>Title</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nemo vero suscipit dignissimos quam iure, rerum odio ipsa et deleniti nobis nisi laborum placeat consectetur in quibusdam quae, est ad?
                            Sit architecto magnam perspiciatis nemo tenetur mollitia, at dolor consequuntur doloremque illum non, expedita dolore maxime ea aperiam illo? Repellendus natus tempore iusto illum sapiente alias reprehenderit voluptatem molestiae accusantium.</p>
                        </div>
                        <div class="blog-view">
                        <a href="public_noticias.php" class="button" target="_blank">Leer más</a>
                        </div>
                        <div class="posted-date">
                            <p>Publicación 1 de noviembre del 2022</p>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="img-section">
                            <img src="Images/Noticia3.jpg" alt="">
                        </div>
                        <div class="article">
                            <h4>Title</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nemo vero suscipit dignissimos quam iure, rerum odio ipsa et deleniti nobis nisi laborum placeat consectetur in quibusdam quae, est ad?
                            Sit architecto magnam perspiciatis nemo tenetur mollitia, at dolor consequuntur doloremque illum non, expedita dolore maxime ea aperiam illo? Repellendus natus tempore iusto illum sapiente alias reprehenderit voluptatem molestiae accusantium.</p>
                        </div>
                        <div class="blog-view">
                        <a href="public_noticias.php" class="button" target="_blank">Leer más</a>
                        </div>
                        <div class="posted-date">
                            <p>Publicación 1 de noviembre del 2022</p>
                        </div>
                    </div> 
    
    <!-- Noticias 2 -->
    
                    </div>
                </div>
           </div>
        <div class="separador3">
            <img src="Images/banner.svg" alt="Barra de separación">
        </div>
    </section>

    <!-- Historia -->

    <section id="historia" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="Images/Colegio3.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text text-back">
                        <h2><i class="fa-solid fa-book"></i>HISTORIA DE NUESTRA INSTITUCIÓN</h2>
                        <p class="text-historia">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quaerat beatae ut culpa officia fugiat, ipsa sed reprehenderit modi aut illo incidunt provident quae aspernatur iure inventore veniam accusantium maiores?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Misión y visión -->

    <section></section>



    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center text-white pb-5">
                        <h2><i class="fa-solid fa-person-chalkboard"></i>REPRESENTANTES</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem in, molestiae laborum culpa minima illo cumque! Ipsa ipsum eos rem maxime. Quia cum corrupti debitis qui officia minus totam consequuntur.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center bg-dark">
                        <div class="card-body text-white">
                            <img src="Images/img_avatar4.png" class="img-fluid rounded-circle" alt="">
                            <h3 class="card-title py-2">PERSONERO</h3>
                            <p class="card-text">Lorem 123</p>
                            <p class="socials">
                                <i class="bi bi-twitter text-white mx-1"></i>
                                <i class="bi bi-facebook text-white mx-1"></i>
                                <i class="bi bi-linkedin text-white mx-1"></i>
                                <i class="bi bi-instagram text-white mx-1"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- User 2 -->

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center bg-dark">
                        <div class="card-body text-white">
                            <img src="Images/img_avatar.png" class="img-fluid rounded-circle" alt="">
                            <h3 class="card-title py-2">CONTRALOR</h3>
                            <p class="card-text">Lorem 123</p>
                            <p class="socials">
                                <i class="bi bi-twitter text-white mx-1"></i>
                                <i class="bi bi-facebook text-white mx-1"></i>
                                <i class="bi bi-linkedin text-white mx-1"></i>
                                <i class="bi bi-instagram text-white mx-1"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- User 3 -->

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center bg-dark">
                        <div class="card-body text-white">
                            <img src="Images/img_avatar2.png" class="img-fluid rounded-circle" alt="">
                            <h3 class="card-title py-2">RECTORA</h3>
                            <p class="card-text">Lorem 123</p>
                            <p class="socials">
                                <i class="bi bi-twitter text-white mx-1"></i>
                                <i class="bi bi-facebook text-white mx-1"></i>
                                <i class="bi bi-linkedin text-white mx-1"></i>
                                <i class="bi bi-instagram text-white mx-1"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- User 4-->

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center bg-dark">
                        <div class="card-body text-white">
                            <img src="Images/img_avatar3.png" class="img-fluid rounded-circle" alt="">
                            <h3 class="card-title py-2">DOCENTE SISTEMAS</h3>
                            <p class="card-text">Lorem 123</p>
                            <p class="socials">
                                <i class="bi bi-twitter text-white mx-1"></i>
                                <i class="bi bi-facebook text-white mx-1"></i>
                                <i class="bi bi-linkedin text-white mx-1"></i>
                                <i class="bi bi-instagram text-white mx-1"></i>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- Contacto -->

    <section id="contacto" class="contact section-padding">
        <div class="separador3">
            <img src="Images/banner.svg" alt="Barra de separación">
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center text-white pb-5">
                        <h2><i class="fa-regular fa-address-book"></i>CONTACTO</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio totam doloremque asperiores iste excepturi eveniet numquam earum, illum eos velit nihil quidem at amet soluta, labore sunt nemo ratione. Quam!</p>
                    </div>
                </div>
            </div>

            <div class="row m-0">
                <div class="col-md-12 p-0 pt-4 pb-4">
                    <form action="#" class="bg-dark p-4 m-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Correo">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="Mensaje" rows="3"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block mt-3">Enviar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>

    <!-- Pie de página -->

    <footer id="footer">
        <div class="container__footer">
            <div class="box__footer">
                <div class="escudo_footer">
                    <img src="Images/escudo.png" alt="Escudo Atanasio Girardot">
                </div>
                <div class="terminos">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora aspernatur voluptatem modi? Minima nobis quasi labore recusandae hic totam tempora deleniti quos voluptates! Magni quia amet repellat possimus quasi labore?</p>
                </div>
            </div>
            <div class="box__footer">
                <h2>Contacto</h2>
                <a href="#">Ubicación</a>
                <a href="#">Correo Electronico</a>
                <a href="#">Número de contacto</a>
                <div class="footer__convenio">
                    <img src="Images/Alcaldia-De-Manizales.png" alt="Alcaldia De Manizales">
                </div>
            </div>

            <div class="box__footer">
                <h2>Convenio Público</h2>
                <a href="#">Secretaria de eduación</a>
                <a href="#">Alcaldia de Manizales</a>
                <a href="#">SENA</a>
                <div class="footer__convenio">
                    <img src="Images/Secretaria.jpg" alt="Alcaldia De Manizales" class="secretaria">
                </div>
            </div>

            <div class="box__footer">
                <h2>Redes Sociales</h2>
                <a href="#"><i class="fa-brands fa-square-facebook"></i>Facebook</a>
                <a href="#"><i class="fa-brands fa-youtube"></i>Youtube</a>
                <a href="#"><i class="fa-brands fa-square-instagram"></i>Instagram</a>
                <div class="footer__convenio">
                    <img src="Images/logo.png" alt="Alcaldia De Manizales">
                </div>
            </div>
        </div>
        <div class="box__copyright">
            <hr>
            <p>Todos los derechos reservados &copy;<b>I.E Atanasio Girardot</b> 2022</p>
        </div>
    </footer>

    <script src="Js/main.js"></script>
</body>

</html>