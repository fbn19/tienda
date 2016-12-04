<?php
include('../Sql/sql_connection.php');
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
                <div class="row">
                    <table class="table">
                        <tr>
                            <td>#transacción</td>
                            <td>Monto</td>
                            <td>Producto</td>
                            <td>Usuario</td>
                            <td># de Tarjeta</td>
                            <td>Fecha</td>
                        </tr>
                        <?php
                            $sql=' select transaccion.id_transaccion,usuario.nombre usuario,monto,fecha,tc,producto.nombre producto from transaccion,usuario,detalle,producto 
                            where usuario.id_usuario=transaccion.id_usuario and detalle.id_transaccion=transaccion.id_transaccion and  producto.id_producto=detalle.id_producto';
                             $result = mysqli_query($mysqli, $sql);
                             while($obj = mysqli_fetch_array($result)){       

                                    echo'
                                    <tr>
                                        <td>'.$obj["id_transacion"].'</td>
                                        <td>'.$obj["monto"].'</td>
                                        <td>'.$obj["producto"].'</td>
                                        <td>'.$obj["usuario"].'</td>
                                        <td>'.$obj["tc"].'</td>
                                        <td>'.$obj["fecha"].'</td>
                                    </tr>';
                                }
                        ?>
                    </table>
			
                </div>
            </div>
        </div>   

</div>


 



   

</body>
</html>