<?php 
    include "conexion.inc.php";
    session_start();
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["pass"];
    $res = mysqli_query($con, "SELECT p.id, concat(p.nombre, ' ', p.paterno, ' ', p.materno) as nombre, u.user, u.pass, u.rol FROM usuario u, persona p WHERE user='".$usuario."' AND pass='".$contraseña."' AND u.id=p.id");
    $fila = mysqli_fetch_array($res);
    if(isset($fila)){
        $_SESSION['id'] = $fila["id"];
        $_SESSION['nombre'] = $fila["nombre"];
        $_SESSION['rol'] = $fila["rol"];
        header("Location: ../usuario/");
    }else{
        echo "Error.";
    }
?>