<?php
include('../Sql/sql_connection.php');
include_once('../Page/cart_class.php');
session_start();
$cart = &$_SESSION['carrito'];

$sql = 'select * from producto';
$result = mysqli_query($mysqli, $sql);


if(isset($_POST['Ingresar'])){

 $sqlo = 'select * from usuario where correo=\''.$_POST['inputEmail'].'\' and password=\''.$_POST['inputPassword'].'\'';
 

    $resulto = $mysqli->query($sqlo);
   
    $obj = mysqli_fetch_array($resulto);

      if(!empty($obj)){
           
           echo '<script type="text/javascript">
                var troll = \''.$obj['nombre'].'\';
                alert("BIENVENIDO \t" + troll);
                 </script>';

                 
      if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = new Cart();
          }

           $cart->add_product('' ,'' , '',$obj['id_usuario']);
           //ar_dump($cart);
          }else{
            echo '<script type="text/javascript">
            alert("Usuario ó Contraseña Incorrectos");
            </script>';
      }
    
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
   <title>COHOSA</title>
    <link href="../Content/bootstrap.css" rel="stylesheet" />
    <link href="../Content/site.css" rel="stylesheet" />
    <link href="../Content/simple-sidebar.css" rel="stylesheet" />
    <link href="../Content/least.min.css" rel="stylesheet" />

    <script src="/Scripts/modernizr-2.6.2.js"></script>

     <style type="text/css">
         .form-signin {
             text-align: center;
         }
     </style>

     <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Master.php">COHOSA</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../Master.php">Inicio</a></li> 
                    <li><a href="../Page/Acerca.php">Acerca de</a></li>
                    <li><a href="../Page/Contacto.php">Contacto</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../Page/Carrito.php" id="registerLink">Carrito</a></li>
                    <li><a href="../Page/Login.php">Iniciar sesi&#243;n</a></li>
                </ul>

            </div>
        </div>
    </div>


</head>
<body style="background-color:gray">
    
<div id="wrapper"> 
   
<div id="sidebar-wrapper" role="navigation" >

    <ul class="sidebar-nav">       
                  
        <div class="list-group">
            <a href="#" class="list-group-item active">Categorias</a>
            <a href="../Categoria/Accion.php" class="list-group-item">Accion</a>
            <a href="../Categoria/Disparos.php" class="list-group-item">Disparos</a>
            <a href="../Categoria/Estrategia.php" class="list-group-item">Estrategia</a>
            <a href="../Categoria/Simulacion.php" class="list-group-item">Simulacion</a>
            <a href="../Categoria/Deporte.php" class="list-group-item">Deporte</a>
            <a href="../Categoria/Carreras.php" class="list-group-item">Carreras</a>
            <a href="../Categoria/Aventura.php" class="list-group-item">Aventura</a>
            <a href="../Categoria/Rol.php" class="list-group-item">Rol</a>
            
        </div>
                
    </ul>
</div>
   
   <div id="page-content-wrapper" class="text-center" >
            <div class="container-fluid">
                <div class="row"> 

                    <div class="col-md-4 col-md-offset-3">
   	  <form class="form-signin" method="POST">
        <h2 class="text-left" >Iniciar Sesión</h2>
        <label for="inputEmail" class="sr-only">Email o Nombre Usuario</label>
        <input type="Email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="recordar">Recordar
          </label>
        </div>
        <input type="submit" class="btn btn-lg btn-primary " name="Ingresar" value="Ingresar">
      </form>
    <a href="../Page/Registro.php">Registrate</a>
            
    
</div>





                </div>
            </div>
    </div>
   
</div>


 

 <script>
     $("#menu-toggle").click(function (e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
     });
    </script>

   

  
                    

   

</body>
</html>