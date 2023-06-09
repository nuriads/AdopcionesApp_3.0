<?php
//Para que redirija al carrusel directamente si la ventana está en index.php
if($_SERVER['REQUEST_URI']=='/AdopcionesApp_3.0/app/'){
  header('location:./content/inicio/carrusel_inicio.php');
}

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link id="estilos" rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/f41c664533.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script src="./js/menu-usuario.js"></script>
  <script src="./js/carrusel-animales.js"></script>


  <title>Pagina principal Adopciones</title>
</head>

<header>
  <!--Menú---->
 
  <nav id="fondo-menu" class="navbar navbar-expand-lg ">
    <div class="container-fluid ">
      <img id="logomenu" src="" alt="Logo de Adopciones" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a id="inicio" class="nav-link" aria-current="page" href="carrusel_inicio.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="mascotasDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">Mascotas</a>
            <ul class="dropdown-menu" aria-labelledby="mascotasDropdown">
              <li><a id="gatos" class="dropdown-item text-dark" href="">Gatos</a></li>
              <li><a id="perros" class="dropdown-item text-dark" href="">Perros</a></li>
              <li><a id="hurones" class="dropdown-item text-dark" href="">Hurones</a></li>
              <li><a id="otros" class="dropdown-item text-dark" href="">Otros</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="mascotasDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">Colabora</a>
            <ul class="dropdown-menu" aria-labelledby="mascotasDropdown">
              <li><a id="adopta" class="dropdown-item text-dark" href="">Estoy interesado/a en adoptar</a></li>
              <li><a id="abuelitos" class="dropdown-item text-dark" href="">Adopta un abuelito</a></li>
              <li><a id="voluntariado" class="dropdown-item text-dark" href="">Voluntariado</a></li>
              <li><a id="refugiosView" class="dropdown-item text-dark" href="">Listado de refugios</a></li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a id="blog" class="nav-link" aria-current="page" href="">Blog</a>
          </li>
        </ul>
        <div class="row">
          <div class="col-auto">
            <!-- Menú aquí -->
          </div>
        </div>
      </div>
     





      <!--Menú del usuario-->
      <div class="user-container" id="user-menu">
    
        <!--Para cuando NO está la sesión iniciada-->
        <?php if (!isset($_SESSION['rol'])) : ?>
        <a id="iconoUser" href="#" class="modal-link" data-bs-toggle="modal" data-bs-target="#formularioModal"><img id="fotouser" src="" alt="Foto del usuario" id="user-img"></a>
        <?php endif; ?>

        <!--Para cuando SÍ está la sesión iniciada-->
        <?php if (isset($_SESSION['rol'])) : ?>
        <a id="iconoUser" href="" ><img id="fotouser" src="" alt="Foto del usuario" id="user-img"></a>

        <div class="user-dropdown" id="user-menu">
          <ul>
            <li><a id="mi_perfil" href="">Mi perfil</a></li>
            <li><a id="cerrar_sesion" href="">Cerrar sesión</a></li>
          </ul>
        </div>


        <?php endif; ?>

       
      </div>
    </div>
  </nav>

</header>
<body>

<?php 

//ESRTABLECEMOS LAS RUTAS PARA EL MENÚ SEGÚN DONDE NOS ENCONTREMOS
// Ruta actual de la ventana
$rutaActual = $_SERVER['REQUEST_URI'];

// Expresión regular 
$expresionRegular = '#^/AdopcionesApp_3\.0/app/content/([^/]+)/([^/]+)/([^/]+)$#';

// Compara la ruta actual con la expresión regular
if (preg_match($expresionRegular, $rutaActual,$matches)) {
    include '../../registro/modal_registro.php';
} else{
    include '../registro/modal_registro.php';
}


?> 
<script>
  
  // Obtener la URL actual de la ventana
  var currentURL = window.location.href;

// Definir las variables urluser y urllogo
var urlestilos;
var urluser;
var urllogo;
var urlindex;
var urlgatos;
var urlperros;
var urlhurones;
var urlotros;
var urladopta;
var urlabuelitos;
var urlvoluntariado;
var urliconoUser;

var urlmiperfil;
var urlcerrarsesion;
var urlblog;

var urlrefugios;
var urlmiperfil;
var urlregistroanimal;
// Verificar la URL actual y asignar los valores correspondientes utilizando un switch
switch (currentURL) {

case 'http://localhost/AdopcionesApp_3.0/app/':
 urlestilos='../assets/style.css';
 urluser = '../assets/images/users/avatardefault.png';
 urllogo = '../assets/images/logos/logo4.PNG';
 urlindex='./content/inicio/carrusel_inicio.php';
 urlgatos='';
 urlperros='';
 urlhurones='';
 urlotros='';
 urladopta='';
 urlabuelitos='';
 urlvoluntariado='';
 urliconoUser='./content/registro/registro.php';


 urlmiperfil='';
 urlcerrarsesion='';
 urlblog='';
 urlrefugios='';
 urlregistroanimal='';
 break;
case 'http://localhost/AdopcionesApp_3.0/app/content/inicio/carrusel_inicio.php':
 urlestilos='../../../assets/style.css';
 urluser = '../../../assets/images/users/avatardefault.png';
 urllogo = '../../../assets/images/logos/logo4.PNG';
 urlindex='../inicio/carrusel_inicio.php';
 urlgatos='../mascotas/gatos.php';
 urlperros='../mascotas/perros.php';
 urlhurones='../mascotas/hurones.php';
 urlotros='../mascotas/otros-animales.php';
 urladopta='../colabora/adopta.php';
 urlabuelitos='../colabora/abuelitos.php';
 urlvoluntariado='../colabora/voluntariado.php';
 urlrefugios='../colabora/refugiosView.php';
 urliconoUser='../desplegable_usuario/mi_perfil.php';
 urlcerrarsesion='../desplegable_usuario/cerrar_sesion.php';
 urlmiperfil='../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../desplegable_usuario/registro_animales.php';
 urlblog='../blog/blog.php';

 break;
case 'http://localhost/AdopcionesApp_3.0/app/content/mascotas/perros.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/mascotas/gatos.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/mascotas/hurones.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/mascotas/otros-animales.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/mascotas/mascotas.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/mascotas/ficha_mascota.php':
 urlestilos='../../../assets/style.css'; 
 urluser = '../../../assets/images/users/avatardefault.png';
 urllogo = '../../../assets/images/logos/logo4.PNG';
 urlindex='../inicio/carrusel_inicio.php';
 urlgatos='./gatos.php';
 urlperros='./perros.php';
 urlhurones='./hurones.php';
 urlotros='./otros-animales.php';
 urladopta='../colabora/adopta.php';
 urlabuelitos='../colabora/abuelitos.php';
 urlvoluntariado='../colabora/voluntariado.php';
 urlrefugios='../colabora/refugiosView.php';
 urliconoUser='../desplegable_usuario/mi_perfil.php';
 urlcerrarsesion='../desplegable_usuario/cerrar_sesion.php';
 urlmiperfil='../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../desplegable_usuario/registro_animales.php';
 urlblog='../blog/blog.php';
 
 break;
case 'http://localhost/AdopcionesApp_3.0/app/content/colabora/adopta.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/colabora/abuelitos.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/colabora/voluntariado.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/colabora/donativos.php':
case 'http://localhost/AdopcionesApp_3.0/app/content/colabora/refugiosView.php':
 urlestilos='../../../assets/style.css'; 
 urluser = '../../../assets/images/users/avatardefault.png';
 urllogo = '../../../assets/images/logos/logo4.PNG';
 urlindex='../inicio/carrusel_inicio.php';
 urlgatos='../mascotas/gatos.php';
 urlperros='../mascotas/perros.php';
 urlhurones='../mascotas/hurones.php';
 urlotros='../mascotas/otros-animales.php';
 urladopta='./adopta.php';
 urlabuelitos='./abuelitos.php';
 urlvoluntariado='./voluntariado.php';
 urlrefugios='./refugiosView.php';
 urliconoUser='../desplegable_usuario/mi_perfil.php';
 urlcerrarsesion='../desplegable_usuario/cerrar_sesion.php';
 urlmiperfil='../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../desplegable_usuario/registro_animales.php';
 urlblog='../blog/blog.php';
 break;
 case 'http://localhost/AdopcionesApp_3.0/app/content/blog/blog.php':
 urlestilos='../../../assets/style.css';
 urluser = '../../../assets/images/users/avatardefault.png';
 urllogo = '../../../assets/images/logos/logo4.PNG';
 urlindex='../inicio/carrusel_inicio.php';
 urlgatos='../mascotas/gatos.php';
 urlperros='../mascotas/perros.php';
 urlhurones='../mascotas/hurones.php';
 urlotros='../mascotas/otros-animales.php';
 urladopta='../colabora/adopta.php';
 urlabuelitos='../colabora/abuelitos.php';
 urlvoluntariado='../colabora/voluntariado.php';
 urlrefugios='../colabora/refugiosView.php';
 urliconoUser='../desplegable_usuario/mi_perfil.php';
 urlmiperfil='../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../desplegable_usuario/registro_animales.php';
 urlcerrarsesion='../desplegable_usuario/cerrar_sesion.php';
 urlblog='#';
 break;
case 'http://localhost/AdopcionesApp_3.0/app/content/registro/registro_animales.php':
 urlestilos='../../../assets/style.css';
 urluser = '../../../assets/images/users/avatardefault.png';
 urllogo = '../../../assets/images/logos/logo4.PNG';
 urlindex='../inicio/carrusel_inicio.php';
 urlgatos='../mascotas/gatos.php';
 urlperros='../mascotas/perros.php';
 urlhurones='../mascotas/hurones.php';
 urlotros='../mascotas/otros-animales.php';
 urladopta='../colabora/adopta.php';
 urlabuelitos='../colabora/abuelitos.php';
 urlvoluntariado='../colabora/voluntariado.php';
 urlrefugios='../colabora/refugiosView.php';
 urliconoUser='../desplegable_usuario/mi_perfil.php';
 urlcerrarsesion='../desplegable_usuario/cerrar_sesion.php';
 urlmiperfil='../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../desplegable_usuario/registro_animales.php';
 urlblog='../blog/blog.php';
 break;
 case 'http://localhost/AdopcionesApp_3.0/app/helpers/procesar_form_refugios.php':
 case 'http://localhost/AdopcionesApp_3.0/app/helpers/procesar_form_usuario.php':
 case 'http://localhost/AdopcionesApp_3.0/app/helpers/procesar_inicio_sesion.php':
 urlestilos='../../assets/style.css';
 urluser = '../../assets/images/users/avatardefault.png';
 urllogo = '../../assets/images/logos/logo4.PNG';
 urlindex='../content/inicio/carrusel_inicio.php';
 urlgatos='../content/mascotas/gatos.php';
 urlperros='../content/mascotas/perros.php';
 urlhurones='../content/mascotas/hurones.php';
 urlotros='../content/mascotas/otros-animales.php';
 urladopta='../content/colabora/adopta.php';
 urlabuelitos='../content/colabora/abuelitos.php';
 urlvoluntariado='../content/colabora/voluntariado.php';
 urlrefugios='../colabora/refugiosView.php';
 urliconoUser='../desplegable_usuario/mi_perfil.php';
 urlcerrarsesion='../content/desplegable_usuario/cerrar_sesion.php';
 urlmiperfil='../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../desplegable_usuario/registro_animales.php';
 urlblog='../content/blog/blog.php';
   break;
 case 'http://localhost/AdopcionesApp_3.0/app/content/blog/articulos/articulo_kala.php':
 urlestilos='../../../../assets/style.css';
 urluser = '../../../../assets/images/users/avatardefault.png';
 urllogo = '../../../../assets/images/logos/logo4.PNG';
 urlindex='../../inicio/carrusel_inicio.php';
 urlgatos='../../mascotas/gatos.php';
 urlperros='../../mascotas/perros.php';
 urlhurones='../../mascotas/hurones.php';
 urlotros='../../mascotas/otros-animales.php';
 urladopta='../../colabora/adopta.php';
 urlabuelitos='../../colabora/abuelitos.php';
 urlvoluntariado='../../colabora/voluntariado.php';
 urlrefugios='../../colabora/refugiosView.php';
 urliconoUser='../../desplegable_usuario/mi_perfil.php';
 urlcerrarsesion='../../desplegable_usuario/cerrar_sesion.php';
 urlmiperfil='../../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../../desplegable_usuario/registro_animales.php';
 urlblog='../blog.php';
 break;
 case 'http://localhost/AdopcionesApp_3.0/app/content/desplegable_usuario/mi_perfil.php':
  case 'http://localhost/AdopcionesApp_3.0/app/content/desplegable_usuario/gestion_animales.php':
  case 'http://localhost/AdopcionesApp_3.0/app/content/desplegable_usuario/registro_animales.php':
  urlestilos='../../../assets/style.css'; 
 urluser = '../../../assets/images/users/avatardefault.png';
 urllogo = '../../../assets/images/logos/logo4.PNG';
 urlindex='../inicio/carrusel_inicio.php';
 urlgatos='../mascotas/gatos.php';
 urlperros='../mascotas/perros.php';
 urlhurones='../mascotas/hurones.php';
 urlotros='../mascotas/otros-animales.php';
 urladopta='../colabora/adopta.php';
 urlabuelitos='../colabora/abuelitos.php';
 urlvoluntariado='../colabora/voluntariado.php';
 urlrefugios='../colabora/refugiosView.php';
 urliconoUser='../desplegable_usuario/mi_perfil.php';
urlcerrarsesion='../desplegable_usuario/cerrar_sesion.php';
 urlmiperfil='../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../desplegable_usuario/registro_animales.php';
 urlblog='../blog/blog.php';
 
 break;
  
}

//Para que cuandola url tenga petición get sigan funcionando las urls
var rutaActual = window.location.href;
var expresionRegular = /^http:\/\/localhost\/AdopcionesApp_3\.0\/app\/content\/colabora\/adopta\.php\?peticion=adoptar&mascota=.*/;
var expresionRegularOrden = /^http:\/\/localhost\/AdopcionesApp_3\.0\/app\/content\/desplegable_usuario\/mi_perfil\.php\?orden=.*/;
var expresionRegularEditanimales = /^http:\/\/localhost\/AdopcionesApp_3\.0\/app\/content\/desplegable_usuario\/edicion_animales\.php\?animal=.*/;

if (expresionRegular.test(rutaActual)|| expresionRegularOrden.test(rutaActual) || expresionRegularEditanimales.test(rutaActual)) {
  console.log("La ruta actual coincide con la expresión regular.");
  urlestilos='../../../assets/style.css'; 
 urluser = '../../../assets/images/users/avatardefault.png';
 urllogo = '../../../assets/images/logos/logo4.PNG';
 urlindex='../inicio/carrusel_inicio.php';
 urlgatos='../mascotas/gatos.php';
 urlperros='../mascotas/perros.php';
 urlhurones='../mascotas/hurones.php';
 urlotros='../mascotas/otros-animales.php';
 urladopta='./adopta.php';
 urlabuelitos='./abuelitos.php';
 urlvoluntariado='./voluntariado.php';
 urlrefugios='./refugiosView.php';
 urliconoUser='../desplegable_usuario/mi_perfil.php';
urlcerrarsesion='../desplegable_usuario/cerrar_sesion.php';
 urlmiperfil='../desplegable_usuario/mi_perfil.php';
 urlregistroanimal='../desplegable_usuario/registro_animales.php';
 urlblog='../blog/blog.php';
} else {
  console.log("La ruta actual no coincide con la expresión regular.");
}
// Pongo los valores de cada variable en el href o src del elemento html correspondiente
//Blog

var linkblog = document.getElementById("blog");
linkblog.href = urlblog;
console.log(typeof(linkblog));
console.log(linkblog.href);

//Style
var linkestilos = document.getElementById("estilos");
linkestilos.href = urlestilos;

//Nav Inicio
var linkinicio = document.getElementById("inicio");
linkinicio.href = urlindex;

var linkiconoUser = document.getElementById("iconoUser");
linkiconoUser.href = urliconoUser;

var imglogo = document.getElementById("logomenu");
imglogo.src = urllogo;

var imguser = document.getElementById("fotouser");
imguser.src = urluser;

//Nav Mascotas
var linkgatos = document.getElementById("gatos");
linkgatos.href = urlgatos;
console.log(linkgatos);

var linkperros = document.getElementById("perros");
linkperros.href = urlperros;

var linkhurones = document.getElementById("hurones");
linkhurones.href = urlhurones;

var linkotros = document.getElementById("otros");
linkotros.href = urlotros;

//Colabora
var linkadopta = document.getElementById("adopta");
linkadopta.href = urladopta;
var linkabuelitos = document.getElementById("abuelitos");
linkabuelitos.href = urlabuelitos;
var linkvoluntariado = document.getElementById("voluntariado");
linkvoluntariado.href = urlvoluntariado;


var linkrefugios = document.getElementById("refugiosView");
linkrefugios.href = urlrefugios;
//Desplagable Usuario
var linkcerrarsesion = document.getElementById("cerrar_sesion");
linkcerrarsesion.href = urlcerrarsesion;
var linkmiperfil = document.getElementById("mi_perfil");
linkmiperfil.href = urlmiperfil;



</script>

</body>

</html>