
<section class="features12 cid-sKO0nMeSzR" id="features13-3">

    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(255, 255, 255);">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <hr class="line">
                <p class="mbr-text align-center mbr-fonts-style my-4 display-5">Bienvenidos a la pagina de inscripcion del curso de Verano - 2021</p>
                <hr class="line">
            </div>
        </div>
        <center>

        <div class="alert alert-success" role="alert" style="width: 40rem;">
            <h4 class="alert-heading">Inscribete alos siguientes cursos</h4>
            <p>la lista de materias disponibles:</p>
            <p class="mb-0">Fecha: <?php echo date("Y-m-d");?></p>
            <hr>
            <div class="card">
                <div class="card-header">
                    MATERIAS HABILITADAS
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <caption>La lista muestra las materias en las que puedes inscribirte.</caption>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">sigla</th>
                                <th scope="col">nombre</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
include("config/conexion.inc.php");
$sql = "SELECT * from materia";
$resultado = mysqli_query($con, $sql);
$ad = 0;
while ($fila = mysqli_fetch_array($resultado)){
    echo "<tr>";
    $ad = $ad +1;
    echo "<td>".$ad."</td>";
    echo "<td>".$fila["sigla"]."</td>";
    echo "<td>".$fila["nombre"]."</td>";
    echo "</tr>";
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </center>
    </div>
</section>