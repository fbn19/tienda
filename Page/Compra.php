<?php
include('../Sql/sql_connection.php');
include_once('../Page/cart_class.php');
session_start();
//var_dump($_SESSION);
$cart = &$_SESSION['carrito'];
 


if(isset($_POST['add_product'])){


    foreach($_SESSION['carrito']->productos as $product){
        $sqlt='insert into transaccion values (null,'.$product->id_user.',curdate(),'.$_POST['nombre'].')';
            $mysqli->query($sqlt);
    $sqlt;
    
    $sql = 'select * from transaccion';
    $result = mysqli_query($mysqli, $sql);
    while($obj = mysqli_fetch_array($result)){
        $id=$obj['id_transaccion'];
    }

//   var_dump($id);
    foreach($_SESSION['carrito']->productos as $product){
            $datos = 'SELECT * FROM producto WHERE id_producto = '.$product->id_producto;
            $resulto = $mysqli->query($datos);
            
            while( $producto = mysqli_fetch_array($resulto)){


                 $sqld='insert into detalle values (null,'.$id.','.$product->id_producto.','.$product->cantidad.')';
                 $mysqli->query($sqld);
                 $sqld;
                 //var_dump($sqld);
             }
            

            
    //echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=../Page/Compra.php">';
        }
    }
    echo '<script type="text/javascript">
            alert("La Compra Ha Sido Exitosa");
            </script>';
  session_destroy();      
}
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
    
    <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row" >
                
        <section id="least">
        <ul class="least-gallery">
            <table class="table">
                
                <?php 
                    foreach($_SESSION['carrito']->productos as $product){
                        $datos = 'SELECT * FROM producto WHERE id_producto = '.$product->id_producto;
                        $resulto = $mysqli->query($datos);
                       // var_dump($datos);
                        echo "<lu class=\"least-gallery\">";
                      while( $producto = mysqli_fetch_array($resulto)){
                      
                        
                        echo "<li>
                                <a href='#'  rel=\"lighbox\" title=\"".$producto['nombre']."\" data-subtitle=\"$".$producto['precio']."\" >
                                    <img src=\"../".$producto['imagen']."\"  />
                                </a></li>";
                               $precio=$precio+$producto['precio'];
                                }
                                echo "<lu>";
                    }
                ?>
            </table>

            <div class="col-md-4 col-md-offset-3">
            <form method=POST>
                <table>
                    <tr>
                        <td>Monto</td>
                        <td>
                            <?php

                                echo"<input type=\"text\" name=\"nombre\" value=\"".$precio."\" class=\"form-control\" style=\"text-align:center\" readonly>";
                            ?>
                        </td>
                    </tr>
                </table>
                <input class="btn btn-lg btn-primary" type="submit" value="Comprar" name="add_product">
                 </form>
            </div>
            </ul>
           
           </section>
          

        </div>

                </div>
            </div>
        </div>   

</div>

  

</body>
</html>