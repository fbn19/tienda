<?php
include('../Sql/sql_connection.php');
include_once('../Page/cart_class.php');
session_start();

//var_dump($_SESSION);
$cart = &$_SESSION['carrito'];

if(isset($_POST['add_product'])){
    
    
    
    if ($_POST['id_producto']=="") {
        echo '<script type="text/javascript">
            alert("No Hay Nada que Agregar al Carrito");
            </script>';
    }else{
        $cart->add_product($_POST['id_producto']);
    }
    
}
if(isset($_GET['product_id'])){
    if(!is_numeric($_GET['product_id'])){
        echo '<script type="text/javascript">
            alert("No se ha seleccionado producto");
            </script>';
        header('Location: ../Master.php');
    }
}

//Se obtiene informacion de producto
//global $mysqli;
$sql = 'SELECT * FROM producto WHERE id_producto = '.$_GET['product_id'];
$result = $mysqli->query($sql);
//var_dump($result);
$product = mysqli_fetch_array($result);
//var_dump($product);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
   <title>COHOSA</title>
  
    <link href="../Content/bootstrap.css" rel="stylesheet" />
    <link href="../Content/site.css" rel="stylesheet" />
    <link href="../Content/simple-sidebar.css" rel="stylesheet" />
    <link href="../Content/least.min.css" rel="stylesheet" />

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
<body><body style="background-color:gray">    
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
    
<div id="page-content-wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
            
 <section id="least">
            
            <ul class="least-gallery">
                   
                <form method="POST">
               
                    <table >
                     <input type="hidden" value="<?= $_GET['product_id'] ?>" name="id_producto">
                                <?php
                                if(!$_GET['product_id']){
                                    echo'<p>No Hay Nada que Agregar al Carrito</p>';
                                }else{
                                    
                                    $dato = 'SELECT * FROM producto WHERE id_producto = \''.$_GET['product_id'].'\'';
                                   $resul = $mysqli->query($dato);
                                   // var_dump($datos);
                                    $produc= mysqli_fetch_array($resul);
                                    echo "<li>
                                <a href='#'  rel=\"lighbox\" title=\"".$produc['nombre']."\" data-subtitle=\"$".$produc['precio']."\" >
                                    <img src=\"../".$produc['imagen']."\"  /> 
                                </a></li>";
                               
                                }
                                ?>
                            
                    </table>
                    <input class="btn btn-lg btn-primary" type="submit" value="Añadir al Carrito" name="add_product">
                </form>
                </ul>
                </section>
            </div>
        </div>
              
        <div class="row" >
       
        <section id="least">
        <ul class="least-gallery">
        

            <table class="table">
                
                <?php 
                    foreach($_SESSION['carrito']->productos as $product){
                        $datos = 'SELECT * FROM producto WHERE id_producto = '.$product->id_producto;
                        $resulto = $mysqli->query($datos);
                       // var_dump($datos);
                        
                      while( $producto = mysqli_fetch_array($resulto)){
                       echo "<li>
                                <a href='#'  rel=\"lighbox\" title=\"".$producto['nombre']."\" data-subtitle=\"$".$producto['precio']."\" >
                                    <img src=\"../".$producto['imagen']."\"  />
                                </a></li>";
                               
                                }
                                
                    }
                ?>
            </table>
            <div class="col-md-4 col-md-offset-3">
            <a href="../Page/Compra.php" class="btn btn-lg btn-primary"> Comprar</a> 
            </div>
            </ul>
            
            </section>
            
        </div>

    </div>
</div>
</body>
</html>