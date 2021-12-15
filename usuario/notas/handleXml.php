<?php
// helper para obtner mediante funsiones datos de xml para el motor
include("flujo.php");
$condicionales = new SimpleXMLElement($xmlstrCondicional);
//echo $condicionales->condicional[0]->no;

$flujos = new SimpleXMLElement($xmlstrFLujos);
//echo $flujos->flujo[0]->proceso;

function getCondicion($proc,$condicionales){
    //obtenemos el proceso siguiente
    $cnd = array();
    $tamanio = count($condicionales->condicional);


    for ( $x=0; $x<$tamanio; $x++){
        $procTmp = $condicionales->condicional[$x]->proc;
        //echo "\n".$proc." : ".$procTmp."\n";
        //$flujo = $flujos->flujo[$x]->proceso;
        if($proc == $procTmp ){
            $cnd["SI"] = $condicionales->condicional[$x]->si;
            $cnd["NO"] = $condicionales->condicional[$x]->no;
        }
    }
    
    return $cnd;
}
function getProcSig($proc, $flujo,$flujos){
    //obtenemos el proceso siguiente
    $tamanio = count($flujos->flujo);
    $answer ="P1";
    for ( $x=0; $x<$tamanio; $x++){
        $procTmp = $flujos->flujo[$x]->proceso;
        //echo "\n".$proc." : ".$procTmp."\n";
        //$flujo = $flujos->flujo[$x]->proceso;
        if($proc == $procTmp ){
            $answer= $flujos->flujo[$x]->procSig;
            //echo $answer;
        }
    }
    
    return $answer;
}
function getProc($proc, $flujo,$flujos){
    //obtenemos el proceso siguiente
    $tamanio = count($flujos->flujo);
    $answer ="P1";
    for ( $x=0; $x<$tamanio; $x++){
        $procTmp = $flujos->flujo[$x]->procSig;
        //echo "\n".$proc." : ".$procTmp."\n";
        //$flujo = $flujos->flujo[$x]->proceso;
        if($proc == $procTmp ){
            $answer= $flujos->flujo[$x]->proceso;
            //echo $answer;
        }
    }
    
    return $answer;
}
function getForm($proc, $flujos){
    //obtenemos el proceso siguiente
    $tamanio = count($flujos->flujo);
    $answer ="v";
    for ( $x=0; $x<$tamanio; $x++){
        $procTmp = $flujos->flujo[$x]->proceso;
        //echo "\n".$proc." : ".$procTmp."\n";
        //$flujo = $flujos->flujo[$x]->proceso;
        if($proc == $procTmp ){
            $answer= $flujos->flujo[$x]->formulario;
            //echo $answer;
        }
    }
    
    return $answer;
}
//echo getForm("P1", $flujos);
?>