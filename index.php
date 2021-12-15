<?php
    $rol = 2;
    $color = "";
    session_start();
    //session_destroy();
    include "cabecera.inc.php";
    if(!isset($_SESSION['rol'])){
        include "menu.inc.php";
    }else{
        include "menuusuario.inc.php";
        if($_SESSION['rol'] == 0){
            $color = "#FFFFFF";
        }elseif($_SESSION['rol'] == 1){
            $color = "#FF6347";
        }elseif($_SESSION['rol'] == 2){
            $color = "#3CB371";
        }else{
            $color = "#808080";
        }  
    }
    include "cuerpo.inc.php";
    include "pie.inc.php";
?>