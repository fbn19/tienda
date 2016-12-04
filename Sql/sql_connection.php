<?php
$mysqli = new mysqli('localhost', 'root', 'Nauj666','shop');

if($mysqli->connect_errno)
        echo '<script type="text/javascript">
            alert("Imposible conectarse a la Base de Datos");
            </script>';

?>