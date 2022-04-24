<?php



define('_UOC', 1);
require('../db_connection.php');


$query = "SELECT * FROM `courses` WHERE 1";
$result = mysqli_query($conn, $query) or die(mysql_error());

$email = $_SESSION["email"];
$query2 = "SELECT * FROM `students` WHERE `email` = '{$email}'";
$result2 = mysqli_query($conn, $query2) or die(mysql_error());
$value2 = mysqli_fetch_assoc($result2);
$id_usuario = $value2["id"];






?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cursos Student</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha de Fin</th>
                    <th scope="col">Inscrito</th>

                </tr>
            </thead>
            <tbody>
                <?php
                // Recorremos los resultados
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_course"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["date_start"] . "</td>";
                        echo "<td>" . $row["date_end"] . "</td>";

                        $query16 = "SELECT * FROM enrollment where id_student = $id_usuario and id_course = {$row['id_course']}";
                        $result16 = mysqli_query($conn, $query16);
                        $value16 = mysqli_fetch_assoc($result16);



                        if (mysqli_num_rows($result16) > 0 && $value16['status'] == 1) {
                            echo "<td>" . "<a href='cursos/desinscribir.php?id=" .  $row['id_course'] . "'class='btn btn-sm btn-primary'>Ya Inscrito</a>" . "</td>";
                        } else if (mysqli_num_rows($result16) > 0 && $value16['status'] == 0) {
                            echo "<td>" . "<a href='cursos/inscribirseUpdate.php?id=" .  $row['id_course'] . "'class='btn btn-sm btn-danger'>Inscribirse</a>" . "</td>";
                        } else {
                            echo "<td>" . "<a href='cursos/inscribirseInsert.php?id=" .  $row['id_course'] . "'class='btn btn-sm btn-danger'>Inscribirse</a>" . "</td>";
                        }

                        echo "<tr>";
                    }
                } else {
                    echo "No hay resultados.";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>


    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>