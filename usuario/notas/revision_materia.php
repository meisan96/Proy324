<!DOCTYPE html>
<html  >
<head>
  <?php 
  session_start();
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../../assets/images/fcpn-blue-96x96.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Usuario</title>
  <link rel="stylesheet" href="../../assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="../../assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="../../assets/tether/tether.min.css">
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../../assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="../../assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="../../assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="../../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../../assets/socicon/css/styles.css">
  <link rel="stylesheet" href="../../assets/theme/css/style.css">
  <link rel="preload" as="style" href="../../assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="../../assets/mobirise/css/mbr-additional.css" type="text/css">

</head>
<body>
<?php
    include ("../../menuuser.inc.php");
    include("../../config/conexion.inc.php");
    $id = $_GET['idmat'];
?>
    
    <div class="alert alert-success" role="alert">
        <div class="card text-center">
            <div class="card-header">
                Materia <?php 
$sql1 = "SELECT sigla,nombre from materia where id =".$id;
$res = mysqli_query($con, $sql1);
$fil = mysqli_fetch_array($res);
echo $fil["sigla"]." - ".$fil["nombre"];?>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <caption>Lista de estudiantes.</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nombre</th> 
                            <th scope="col">Pago</th> 
                        </tr>
                    </thead>
                    <tbody>
<?php
    $as = 0;
    $sql = "SELECT p.matricula,p.nombre,p.paterno,p.materno,i.comprobante from persona p, inscrito i where p.id = i.id_est and i.id_mat =".$id;
    $resultado = mysqli_query($con, $sql);
    
    while ($fila = mysqli_fetch_array($resultado)){
        echo "<tr>";
        $as = $as +1;
        echo "<td>".$as."</td>";
        echo "<td>".$fila["matricula"]."</td>";
        echo "<td>".$fila["nombre"]." ".$fila["paterno"]." ".$fila["materno"]."</td>";
        echo "<td>".$fila["comprobante"]."</td>";
        echo "</tr>";
    }
?>
                    </tbody>
                </table>
            </div>
        </div>
        <center>
        <form method = "POST" action="habilitar_mat.php">
            <input type="text" name="mate" value="<?php echo $id;?>" hidden /> 
            <input type="submit" value="Cerrar Materia" name="cerrar" class="btn btn-danger" />
            <input type="submit" value="Habilitar Materia" name="abrir" class="btn btn-primary" />
            
        </form>
    </center>
    </div>
<?php include("../../pie.inc.php");


?>