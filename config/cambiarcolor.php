<?php
    include("conexion.inc.php");
    session_start();
    $color = $_GET["color"];
    $sql = "UPDATE usuario SET tema='".$color."' WHERE ci='".$_SESSION['ci']."'";
    mysqli_query($con, $sql);
    $sql2 = "SELECT tema FROM usuario WHERE ci='".$_SESSION['ci']."'";
    $res = mysqli_query($con, $sql2);
    $fila = mysqli_fetch_array($res);
    $_SESSION['tema'] = $fila[0];
    header("location: ../VistaUsuario/");
?>