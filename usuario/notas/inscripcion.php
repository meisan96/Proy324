<div class="alert alert-success" role="alert">

        <p>Inscrpcion de materia.</p>
        <p class="mb-0">Fecha de Ingreso: <?php echo date("Y-m-d");?></p>
        <hr>
        <center>
        <div class="card" style="width:500px;">
            <div class="card-header">
                Selecciona la materia :
            </div>
            <div class="card-body">
                <form method="POST" id="form" name="form" enctype="multipart/form-data" action="">
                <div class="form-row">
                    <div class="form-group col-md-8" >
                        
<select id="materia" name="materia" class="form-control">
<?php
    $sql = "SELECT * FROM materia";
    $res = mysqli_query($con, $sql);
    while($fila = mysqli_fetch_array($res)){
        echo "<option value='".$fila["id"]."' >".$fila["nombre"]."</option>";
        }
?>
</select>
                    </div>
                    <div class="form-group col-md-8" >
                        <label for="inputId" style="float: left;">Nro de Comprobante de pago:</label>
                        <input type="text" class="form-control" id="mat" name="mat" placeholder="Ingrese comprobante...">
                    </div>  
                    <div class="form-group col-md-4" style="padding-top: 75px; ">
                        <input type="submit" class="btn btn-success" id="Registrar" name="Registrar" value="Registrar">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </center>
</div>
<?php
if (isset($_POST['Registrar'])) {
    $mat = $_POST["materia"];
    $com = $_POST["mat"];
    $sql = "INSERT INTO inscrito(id_est,id_mat,comprobante) VALUES (".$_SESSION["id"].",".$mat.",'".$com."')";
    $res = mysqli_query($con, $sql);
    echo '<script language="javascript">alert("Materia inscrita.");</script>';
 }
 ?>