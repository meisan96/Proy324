<?php
include ("../../config/conexion.inc.php");
if (isset($_POST['cerrar'])) {
    $bus = $_POST["mate"];

    $sql = "UPDATE materia set estado = 2 where id=".$bus;
    $res = mysqli_query($con, $sql);
    header("Location:controlflujodoc.php?flujo_seleccionado=F2?");
 }
 if (isset($_POST['abrir'])) {
    $bus = $_POST["mate"];
    $sql = "UPDATE materia set estado = 1 where id=".$bus;
    $res = mysqli_query($con, $sql);
    header("Location:controlflujodoc.php?flujo_seleccionado=F2?");
}
?>