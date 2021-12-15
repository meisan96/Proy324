<?php
    include("../../config/conexion.inc.php");
    
?>
    
    <div class="alert alert-success" role="alert">
        <div class="card text-center">
            <div class="card-header">
                Tus Materias Inscritas
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <caption>Lista de materias.</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sigla</th>
                            <th scope="col">Materia</th>
                            <th scope="col"># inscritos</th>
                            <th scope="col">Lista</th> 
                            <th scope="col">Estado</th> 
                        </tr>
                    </thead>
                    <tbody>
<?php
    $sql = "SELECT * from materia";
    $resultado = mysqli_query($con, $sql);
    while ($fila = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>".$fila["sigla"]."</td>";
        echo "<td>".$fila["nombre"]."</td>";

        $sql1 = "SELECT count(*) as num from inscrito where id_mat=".$fila["id"];
        $res = mysqli_query($con, $sql1);
        $fila1 = mysqli_fetch_array($res);
        echo "<td>".$fila1["num"]."</td>";
        echo "<td><a class='btn btn-success' role='button' href='revision_materia.php?idmat=".$fila["id"]."'>Ver</a></td>";
        if($fila["estado"]==0){
echo "<td><a class='btn btn-primary' role='button' href='#'>Pendiente</a></td>";
        }else{
            if($fila["estado"]==1){
                echo "<td><a class='btn btn-success' role='button' href='#'>Habilitado</a></td>";
            }else{
echo "<td><a class='btn btn-danger' role='button' href='#'>Cerrado </a></td>";
            }
        }
        echo "</tr>";
    }
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    