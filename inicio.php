<?php
    session_start();
    $sesion=$_SESSION['sesion'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Estilos-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Inicio</title>
</head>
<body>
    <!--Menu superior-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="inicio.php"><img src="img/icon.png" alt="icono" id="icono"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#nosotros">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="paquete.php">Paquetes</a>
                            </li>
                        </ul>
                        <button id="sesion" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><?php echo $sesion ?></button>
                        <!--Modal-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="info">
                                            <div class="d-flex justify-content-center" id="avatar">
                                                <img src="img/avatar.png" alt="avatar">
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <h3><?php echo $sesion ?></h3>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="botones_modal">
                                            <div class="d-flex justify-content-center">
                                                <button type="button" class="btn btn-outline-primary" onclick="reservaciones()">Reservaciones</button>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-center">
                                                <button type="button" class="btn btn-outline-danger" onclick="cerrar()">Cerrar sesion</button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Ocultar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Termina modal-->
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Escribe aqui" aria-label="Search">
                            <button class="btn btn-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!--Termina menu superior-->
    <!--Imagenes deslizables-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block w-100" data-src="holder.js/900x300?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [900x300]" src="img/destino.jpg" data-holder-rendered="true">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Los destinos mas hermosos</h3>
                                    <p>Vuelve a ser joven, viviendo todas las aventuras que algun dia quisiste.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" data-src="holder.js/900x300?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [900x300]" src="img/aeropuerto.jpg" data-holder-rendered="true">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>La mejor comodidad para viajar</h3>
                                    <p>Contamos con unidades de la mas alta calidad y comodidad.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" data-src="holder.js/900x300?auto=yes&amp;bg=666&amp;fg=444&amp;text=Third slide" alt="Third slide [900x300]" src="img/alojamiento.jpg" data-holder-rendered="true">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Los mejores alojamientos</h3>
                                    <p>Contamos con los mejores alojamientos del mundo y al mejor precio.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>                  
            </div>
        </div>
    </div>
    <!--Termina imagenes deslizable-->
    <br>
    <!--Boton "Comienza tu aventura"-->
    <div class="container"> 
        <div class="row">
            <div class="col-3"></div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="comienza()">Comienza tu aventura ahora</button>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
    <!--Termina boton--> 
    <br>
    <h2>Destinos mas populares</h2>
    <br>
    <!--Seccion de populares-->
    <div class="container" id="populares">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="img/paris.jpg" class="card-img-top" alt="paris">
                    <div class="card-body">
                        <h5 class="card-title">París</h5>
                        <p class="card-text">París, la capital de Francia, es una importante ciudad europea y un 
                        centro mundial del arte, la moda, la gastronomía y la cultura.</p>
                        <a href="paris.php" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="img/china.jpeg" class="card-img-top" alt="china">
                    <div class="card-body">
                        <h5 class="card-title">China</h5>
                        <p class="card-text">Una nación de Asia Oriental cuyos vastos paisajes abarcan praderas, 
                        desiertos, montañas, lagos, ríos y más de 14,000 km de costa.</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="img/londres.jpg" class="card-img-top" alt="londres">
                    <div class="card-body">
                        <h5 class="card-title">Londres</h5>
                        <p class="card-text">Londres, la capital de Inglaterra y del Reino Unido, es una ciudad del 
                        siglo XXI con una historia que se remonta a la época romana.</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="img/losangeles.png" class="card-img-top" alt="losangeles">
                    <div class="card-body">
                        <h5 class="card-title">Los Ángeles</h5>
                        <p class="card-text">Una ciudad en rápido crecimiento del Sur de California y es el núcleo de 
                        la industria televisiva y cinematográfica del país.</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="img/barcelona.jpg" class="card-img-top" alt="barcelona">
                    <div class="card-body">
                        <h5 class="card-title">Barcelona</h5>
                        <p class="card-text">Barcelona, la capital cosmopolita de la región de Cataluña en España, es 
                        conocida por su arte y arquitectura.</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="img/ny.jpg" class="card-img-top" alt="ny">
                    <div class="card-body">
                        <h5 class="card-title">Nueva York</h5>
                        <p class="card-text">Nueva York incluye 5 distritos que se ubican donde el río Hudson desemboca 
                        en el océano Atlántico.</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Termina seccion populares-->
    <br>
    <br>
    <h2>Creando recuerdos increibles</h2>
    <br>
    <br>
    <!--Seccion de actividades-->
    <div class="container" id="actividades">
        <div class="row">
            <ul class="list-unstyled">
                <li class="media">
                    <img src="img/cruzero.jpg" class="mr-3" alt="crucero">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">Las mejores cruceros</h5>
                        Disfrutar de unas vacaciones en un crucero es una de las experiencias más enriquecedoras 
                        porque te permite conocer varios lugares de una región en particular. A bordo de un 
                        crucero las personas tienen la posibilidad de disfrutar un sinfín de actividades como 
                        servicios de spa, shows de entretenimiento, albercas y hasta parques acuáticos. Todo 
                        sin olvidar los magníficos destinos que el crucero recorre durante su ruta.
                    </div>
                </li>
                <li class="media my-4">
                    <img src="img/paseo.jpg" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">Contacto con la naturaleza</h5>
                        Estos lugares, habitantes lejanos de la enorme mancha urbana, son los pulmones más 
                        fuertes de este planeta entero. Son los bosques más bellos de México y en cada uno 
                        de ellos, un relato está listo para contarse.
                    </div>
                </li>
                <li class="media">
                    <img src="img/playa.jpg" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">Las playas más exoticas</h5>
                        Si hablamos de belleza, relajación, ecoturismo, naturaleza y las vacaciones perfectas, 
                        sin duda una playa es la mejor opción.
                    </div>
                </li>
            </ul>    
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-3"></div>
                <div class="col-6">
                    <div class="d-flex justify-content-center" id="logo_nosotros">
                        <img src="img/icon.png" alt="logo">
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
    <!--Termina seccion de actividades-->
    <br>
    <br>
    <!--Seccion de redes sociales e informacion de la empresa-->
    <div class="container" id="contacto">
        <div class="row">
            <div class="col-12 col-sm-7" id="nosotros">
                <h2>VAM</h2>
                <br>
                <p>Somos un equipo mexicano comprometido con cumplir los sueños de viaje de nuestros clientes.
                    Somos un equipo de trabajo conformado por 3 personas dispuestos siempre a brindarle a nuestros 
                    clientes un buen servicio, productos de calidad y las mejores alternativas de viaje para hacer 
                    realidad sus sueños de Viaje.</p>
            </div>
            <div class="col-12 col-sm-5">
                <ul id="redes_sociales">
                    <li><a href="https://www.facebook.com" target="_blank"><img src="img/fb.png" alt="logo_fb"></a></li>
                    <li><a href="https://www.twitter.com" target="_blank"><img src="img/tw.png" alt="logo_tw"></a></li>
                    <li><a href="https://www.instagram.com" target="_blank"><img src="img/in.png" alt="logo_in"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--Termina seccion de redes sociales-->
    <!-- JavaScript -->
    <script src="js/eventos.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>