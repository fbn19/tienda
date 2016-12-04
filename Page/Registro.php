<?php
$mysqli = new mysqli('localhost', 'root', 'Nauj666','shop');

if($mysqli->connect_errno)
     echo '<script type="text/javascript">
            alert("Imposible conectarse a la Base de Datos");
            </script>';



if(isset($_POST['registar'])){
    $sqlo = 'insert into usuario value(null,\''.$_POST['nombre'].'\',\''.$_POST['direccion'].'\',\''.$_POST['inputEmail'].'\',\''.$_POST['inputPassword'].'\','.$_POST['tc'].')';
    
    $resulto = $mysqli->query($sqlo);
    if($resulto){
            $sqlo;
            echo    '<script type="text/javascript">
                    alert("USUARIO FUE REGISTRADO EXITOSAMENTE");
                    </script>';
                }else{
                    echo '<script type="text/javascript">
                        alert("LO SENTIMOS USUARIO NO FUE REGISTRADO");
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
    
    <script>
      function validarSiNumero(numero){ //valida la que tc sea numero 
        if (!/^([0-9])*$/.test(numero))
          alert("El valor " + numero + " no es un número");
      }

function checkForm(form){ //valida si passwords son iguales
    var p1 = form.inputPassword.value;
    var p2 = form.inputPassword1.value;
        if (p1 != p2) {
      alert("Los passwords deben de coincidir");
      return false;
    } else {
      return true; 
    }
}

    </script>

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
            <a class="list-group-item">
                <input type="text" id="search-bar" class="sb-search" placeholder="E.j Halo, GTA" oninput="this.classList.add('-active'); W.App.Templates.debouncedSearch(this.value);">
            </a>
        </div>
                
    </ul>
</div>
   
<div id="page-content-wrapper" class="text-center" >
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-md-offset-3">
                        <form method="POST" onsubmit="return checkForm(this);">
                        <table class="auto-style2">
                            <tr>
                                <td>Nombre</td>
                                <td>
                                    <label for="nombre" class="sr-only">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required autofocus>

                                </td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td>
                                    <label for="direccion" class="sr-only">Mensaje</label>
                                    <input type="text" name="direccion" class="form-control" required autofocus>
                                </td>
                            </tr>
                            <tr>
                                <td>Correo</td>
                                <td>
                                    <label for="inputEmail" class="sr-only">Email address</label>
                                    <input type="email" name="inputEmail" class="form-control" placeholder="Correo" required autofocus>

                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="password" name="inputPassword" class="form-control" placeholder="Password" onChange="validarPasswd();" required autofocus>
                                </td>
                            </tr>
                            <tr>
                                <td>Confirmar Password</td>
                                <td>
                                    <label for="inputPassword1" class="sr-only">Password</label>
                                    <input type="password" name="inputPassword1" class="form-control" placeholder="Password" onChange="validarPasswd();" required autofocus>
                                </td>
                            </tr>

                            <tr>
                                <td>Tarjeta de Credito</td>
                                <td>
                                    <label for="tc" class="sr-only">TC</label>
                                    <input type="text" name="tc" class="form-control"  maxlength="16" onChange="validarSiNumero(this.value);" required autofocus>
                                </td>
                            </tr>
                        </table>
                        
                    <input class="btn btn-lg btn-primary" type="submit" value="Registrarme" name="registar">
                    </form>
                    </div>
                </div>
            </div>
</div>
</body>
</html>
<?php $mysqli->close(); ?>