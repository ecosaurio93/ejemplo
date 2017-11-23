<!DOCTYPE html>
<html lang="en">

  <head>
    <style>
       #map {
        height: 200px;
        width: 200px;
       }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plataforma de educación</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

 

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
         <a class=" js-scroll-trigger" href="#page-top"><img src="img/MULE.png" alt="" >
        <a class="navbar-brand js-scroll-trigger" href="#page-top">ALUMNO</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

             <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Inicio</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Cursos</a>
          </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menú</a>
              <ul class="dropdown-menu">
                         <a class="dropdown-item" href="#">Entregar Tarea</a>
                  <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Lecturas </a>
                  <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Multimedia </a>
                  <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Blog </a>
                  <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Foro </a>
                  <div class="dropdown-divider"></div>
            
          
            </li>
          </ul>
             
    <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php">Salir</a>
          </li>
       
       
        </div>
      </div>
    </nav>

<br></br>
</br>
<br>
<br>
<br>
<br>
<br>
<header >
<center> 
<div>       
 <h2>RESULTADO DE BUSQUEDA</h2>   
</div>
</center> 
<?php session_start(); 
if(!isset($_SESSION['user'])) header("Location:index.html");



$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"plataforma"); 

$busca=$_REQUEST['buscar']; 

$usuario=$_SESSION['user'];

//echo "$busca";

$result2 = mysqli_query($link,"select  * from curso_profe");
$i=1;

echo '<table class="table table-dark">
  
    <tr>
    <td scope="col">N°</td>
      <td scope="col">Id Curso</td>
      <td scope="col">Nombre de Curso</td>
      <td scope="col">Descripcion</td>
      <td scope="col">Profesor</td>
      <td scope="col">Registro</td>
    </tr>';
//$row2=mysqli_fetch_array($result2);
 while($row2 = mysqli_fetch_array($result2)) 
  { 
    $cadena=$row2['nombre_curso']; 
    
  $pos = strripos($cadena, $busca);


 if($pos !== false){
  $id_prof=$row2['id_profesor'];
  $result=mysqli_query($link,"select  * from profesor where id_profesor='$id_prof' ");
  $row = mysqli_fetch_array($result);
     
   $row = mysqli_fetch_array($result);
   
   
  $id_c=$row2['id_curso'];
  $nom=$row2['nombre_curso'];
  $desc=$row2['descripcion'];
  $profe=$row2['nombre_profe'];
 echo "<br>";
  echo "<br>";
   echo "<br>";

echo " <tr><td>$i</td><td>$id_c</td> <td>$nom</td> <td>$desc</td> <td>$profe</td>
<td><a href='registro.php?dato=$id_c'>Registrar</a></td></tr>";

$i=$i+1;

   }

  

 }

echo "</table>"


?>
<center>
<a href="alumno.php" class="btn btn-dark" role="button" aria-pressed="true">Regresar</a>
</center>
</div>
</header>
<br>
<br>
<br>
<br>
<br><br>

<footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
              <h3>Ubicación</h3>
             <center>
    <div id="map"></div>
    <script>
      function initMap() {
        var coordenadas = {lat: 19.005181, lng: -98.204421};//coordenadas latitud, longitud
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: coordenadas
        });
        var marker = new google.maps.Marker({
          position: coordenadas,
          draggeable:true,
          title: 'Arrastrame', //título  sobre el marcador
          animation:google.maps.Animation.BOUNCE,//animación
          map: map
        });
      }
    </script>
  </center>
            </div>
            <div class="footer-col col-md-4">
              <h3>Acerca de la Web</h3>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-linkedin"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-dribbble"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="footer-col col-md-4">
              <h3>Contacto</h3>
              <p>mule@gmail.com
            </p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; Your Website 2017
            </div>
          </div>
        </div>
      </div>
    </footer>

    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>
    <!--Google api-->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtIgeguwfd5ARvs1QDdaVEK5iLmjhkndw&callback=initMap">//dirección del mapa antes del &
    </script>
  </body>

</html>
