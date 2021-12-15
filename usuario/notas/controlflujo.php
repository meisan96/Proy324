<?php
    $flujo = $_GET["flujo_seleccionado"];
    session_start();
    include "../../config/conexion.inc.php";
    $sql = "INSERT INTO seguimiento(flujo, proceso, id, fecha_ini, fecha_fin) VALUES('".$flujo."','P1',".$_SESSION["id"].",'2021/05/30',null)";
    $resultado = mysqli_query($con, $sql);
    header("Location: desflujo.php?flujo=$flujo&proceso=P1");
?>
