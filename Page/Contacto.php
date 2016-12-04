<?php
require('../Page/class.phpmailer.php');
require('../Page/class.smtp.php');


if(isset($_POST['enviar_producto'])){
    $mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
//$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "laraj6666gmail.com"; // Correo completo a utilizar
$mail->Password = "Blender94"; // Contraseña
$mail->Port = 25; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = "laraj6666gmail.com"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Juan Lara";

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
$mail->AddAddress("laraj6666gmail.com"); // Esta es la dirección a donde enviamos
//$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Titulo"; // Este es el titulo del email.
$body = "Hola mundo. Esta es la primer línea";
$body .= "Acá continuo el mensaje";
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
echo 'El correo fue enviado correctamente.';
}else{
echo 'Hubo un inconveniente. Contacta a un administrador.';
}




/*if(!$mail->Send()) {
      //  echo "Error enviando: "  .$mail->ErrorInfo;
        
echo '<script type="text/javascript">
                 
            alert("Erro al enviar" );
            </script>';
        } else {
        echo '<script type="text/javascript">
            alert("Gracias por dejar tu Comentario. \n Estaremos al Pendiente");
            </script>';
        } */



        


   
            
    
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
         .auto-style1 {
             display: block;
             width: 100%;
             height: 116px;
             padding: 6px 12px;
             font-size: 14px;
             line-height: 1.428571429;
             color: #555555;
             vertical-align: middle;
             background-color: #ffffff;
             border: 1px solid #cccccc;
             border-radius: 4px;
             -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
             transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
         }
         .auto-style2 {
             width: 100%;
             height: 356px;
             margin-left: 0;
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
                                    <input type="text" id="nombre" class="form-control" >

                                </td>
                            </tr>
                            <tr>
                                <td>Correo</td>
                                <td>
                                    <label for="inputEmail" class="sr-only">Email address</label>
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" >

                                </td>
                            </tr>
                            <tr>
                                <td>Mensaje</td>
                                <td>
                                    <label for="mensaje" class="sr-only">Mensaje</label>
                                    <input type="text" id="mensaje" class="auto-style1">

                                </td>
                            </tr>
                            
                        </table>
                        
                    <input class="btn btn-lg btn-primary" type="submit" value="Enviar" name="enviar_producto">
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
                    