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
	
    include("handleXml.php");
	$flujo=$_GET["flujo"];
	$proceso=$_GET["proceso"];
	$fila = getForm($proceso, $flujos);
    // print_r ($fila);

	include ("../../menuuser.inc.php");
	include ("../../config/conexion.inc.php");
	?>
	<div class="alert alert-success" role="alert">
		<div class="card-body" style="padding-top: -175px;" >
			<?php include $fila; ?>
		<form action="motor.php" method="GET" enctype="multipart/form-data">		
				<br>
				<input type="hidden" value="<?php echo  $fila;?>" name="formulario"/>
				<input type="hidden" value="<?php echo $flujo?>" name="flujo"/>
				<input type="hidden" value="<?php echo $proceso?>" name="proceso"/>
				<center>
		<?php
            if($proceso != 'P1'){
                echo "<input type='submit' value='Anterior' name='Anterior' class='btn btn-success'/>";
            }
            if($proceso != 'F'){
                echo '<input type="submit" value="Siguiente" name="Siguiente" class="btn btn-success"/>';
            }
        ?>
				</center>
			</form>
		</div>
	</div>
	<?php include("../../pie.inc.php");?>