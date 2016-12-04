<?php
$mysqli = new mysqli('localhost', 'root', 'Nauj666','shop');

if($mysqli->connect_errno)
     echo '<script type="text/javascript">
            alert("Imposible conectarse a la Base de Datos");
            </script>';

$sql = 'select * from categoria';

if(isset($_POST['enviar_producto'])){
    $sqlo = 'insert into producto value(null,\''.$_POST['nombre'].'\',\''.$_POST['precio'].'\',\''.$_POST['categoria'].'\',\''.$_POST['imagen'].'\')';
    
    $resulto = $mysqli->query($sqlo);
    if($resulto)
            $sqlo;
        else
            echo "Producto no insertado";
             
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
                        <form method="POST">
                        <table class="auto-style2">
                            <tr>
                                <td>Nombre</td>
                                <td>
                                    <label for="nombre" class="sr-only">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" >

                                </td>
                            </tr>
                            <tr>
                                <td>Categoria</td>
                                <td>
                                    <label for="cantidad" class="sr-only">Cantidad</label>
                                   <!-- <input type="text" id="cantidad" class="form-control" >-->
                                    <select class="form-control" name="categoria">
                                    <?php
                                     //$result = $mysqli->query($sql);
                                    $result = mysqli_query($mysqli,$sql);
                                     //var_dump($result);
                                    
                                        while($obj = mysqli_fetch_array($result)){
                                            echo "<option value=".$obj['id_categoria'].">".$obj['categoria']."</option>";
                                            //echo "<option>hola</option>";
                                            } 
                                    
                                    ?>
                                      
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>Precio</td>
                                <td>
                                    <label for="precio" class="sr-only">Nombre</label>
                                    <input type="text" name="precio" class="form-control" >

                                </td>
                            </tr>
                            <tr>
                                <td>Imagen</td>
                                <td>
                                    <label for="imagen" class="sr-only">Imagen</label>
                                    <input type="file" name="imagen" class="auto-style1">
                                </td>
                            </tr>
                        </table>
                        
                    <input class="btn btn-lg btn-primary" type="submit" value="AÑADIR" name="enviar_producto">
                    </form>
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
<?php $mysqli->close(); ?>