<?php
session_start();
include ("../../config/conexion.inc.php");
include("handleXml.php");
$res =getProcSig("P1", "F1",$flujos );
$res1 =getForm("P1", $flujos );

$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$formulario=$_GET["formulario"];
    if(isset($_GET["Siguiente"])){
        $procSig= getProcSig($proceso, $flujo,$flujos );
        if ($procSig=='NULL')
		{
			$fila2 = getCondicion($proceso,$condicionales);
            if ($pregunta=='si')
				$procSig=$fila2["SI"];
			else 
				$procSig=$fila2["NO"];
		}

        $sql = "SELECT * FROM seguimiento WHERE flujo='$flujo' AND proceso='$proceso' AND fecha_fin IS NULL AND id=".$_SESSION["id"];
        $resultado = mysqli_query($con, $sql);
        $fila = mysqli_fetch_array($resultado);
        $nro = $fila["nro"];
        if(isset($fila)){
            $sql = "UPDATE seguimiento SET fecha_fin='".date("Y-m-d")."' WHERE flujo='$flujo' AND proceso='$proceso' AND nro='".$fila['nro']."' AND Id=".$_SESSION["id"];           
            $res = mysqli_query($con, $sql);
            if($procSig != "F"){
                $sql6 = "INSERT INTO seguimiento(flujo, proceso, Id, fecha_ini, fecha_fin) VALUES('".$flujo."','".$procSig."',".$_SESSION["id"].",'".date('Y-m-d')."',null)";
                $resultado6 = mysqli_query($con, $sql6);
            }else{
                $sql6 = "INSERT INTO seguimiento(flujo, proceso, Id, fecha_ini, fecha_fin) VALUES('".$flujo."','".$procSig."',".$_SESSION["id"].",'".date('Y-m-d')."','".date('Y-m-d')."')";
                $resultado6 = mysqli_query($con, $sql6);
            }
        }else{
            $sql2 = "SELECT * FROM seguimiento WHERE flujo='$flujo' AND proceso='$proceso' AND fecha_fin IS NOT NULL AND id=".$_SESSION["id"];
            $resultado2 = mysqli_query($con, $sql2);
            $fila2 = mysqli_fetch_array($resultado2);
            if(!isset($fila2)){
                $sql = "INSERT INTO seguimiento (flujo, proceso, Id, fecha_ini, fecha_fin) VALUES ('$flujo','$proceso',".$_SESSION["id"].",'".date('Y-m-d')."','".date('Y-m-d')."')";
                $res = mysqli_query($conn, $sql);
            }
        }
        header("Location:index.php");
    }else{
        $proc = getProc($proceso, $flujo,$flujos );
        header("Location:desflujo.php?flujo=".$flujo."&proceso=".$proc);
    }
	

?>