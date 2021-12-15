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
                    <caption>Lista de materias inscritas.</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sigla</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Codigo</th> 
                            <th scope="col">Estado</th> 
                        </tr>
                    </thead>
                    <tbody>
<?php
    $sql = "SELECT m.estado, m.sigla, m.nombre, i.comprobante from materia m, inscrito i where m.id=i.id_mat and m.id=".$_SESSION["id"];
    $resultado = mysqli_query($con, $sql);
    while ($fila = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>".$fila["sigla"]."</td>";
        echo "<td>".$fila["nombre"]."</td>";
        echo "<td>".$fila["comprobante"]."</td>";
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
    <center>
        <form method = "GET" action="controlflujo.php">
            <input type="text" name="flujo_seleccionado" value="F1" hidden /> 
            <input type="submit" value="Nuevo Materia" name="Nuevo" class="btn btn-primary" />
            
        </form>
    </center>
