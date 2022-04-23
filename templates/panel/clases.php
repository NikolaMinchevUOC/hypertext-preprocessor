<?php



define('_UOC', 1);
require('../db_connection.php');


$query = "SELECT * FROM `class` WHERE 1";
$result = mysqli_query($conn, $query) or die(mysql_error());


function loadTeachers()
{
    require('../db_connection.php');
    global $teacherid;
    global $classId;

    if ($teacherid == "") {
        $query = "SELECT id_teacher AS value, CONCAT(name, ' ', surname) AS name FROM teachers t WHERE NOT EXISTS(SELECT 1 FROM class c WHERE t.id_teacher = c.id_teacher)";
    } else {
        $query = "SELECT id_teacher AS value, CONCAT(name, ' ', surname) AS name FROM teachers t WHERE NOT EXISTS(SELECT 1 FROM class c WHERE t.id_teacher = c.id_teacher) OR id_teacher = $teacherid";
    }

    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='form-floating mb-2'>";
        echo "<p>Profesor:</p><select name=\"teacherid\" class=\"form-control\">";
        while ($row = $result->fetch_assoc()) {
            if (($classId != null) && ($row["value"] == $teacherid)) {
                $selected = "selected=selected";
            } else {
                $selected = "";
            }
            echo "<option value=\"" . $row["value"] . "\" " . $selected . ">" . $row["name"] . "</option>";
        }
        echo "</select>";
    } else {
        echo "No hay profesores disponibles";
    }
    echo "</div>";
}


function loadCourses()
{
    require('../db_connection.php');
    global $courseid;
    global $classId;

    $query = "SELECT id_course AS value, name FROM courses WHERE active = 1";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='form-floating mb-2'>";
        echo "<p>Curso:</p><select name=\"courseid\" class=\"form-control\" placeholder=\"Curso\">";
        while ($row = $result->fetch_assoc()) {
            if (($classId != null) && ($row["value"] == $courseid)) {
                $selected = "selected=selected";
            } else {
                $selected = "";
            }
            echo "<option value=\"" . $row["value"] . "\" " . $selected . ">" . $row["name"] . "</option>";
        }
        echo "</select>";
    } else {
        echo "No hay cursos activos";
    }
    echo "</div>";
}


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clases</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a data-toggle='modal' href='#anadir' class='btn btn-sm btn-secondary'>Añadir Clase</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Clase</th>
                    <th scope="col">Profesor</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Color</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Recorremos los resultados
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_class"] . "</td>";
                        echo "<td>" . $row["id_teacher"] . "</td>";
                        echo "<td>" . $row["id_course"] . "</td>";
                        echo "<td>" . $row["id_schedule"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["color"] . "</td>";

                        echo "<td>" . "<a data-toggle='modal' href='#editar_" . $row["id_class"] . "'class='btn btn-sm btn-primary'>Editar</a>" . "</td>";
                        echo "<td>" . "<a href='clases/eliminar.php?id=" .  $row["id_class"] . "'class='btn btn-sm btn-danger'>Eliminar</a>" . "</td>";

                ?>

                        <!-- Modal Editar-->

                        <?php
                        
                        
                        ?>
                        <div class="modal fade" id="editar_<?php echo $row["id_class"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Editar</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="padding:50px">

                                            <form method="POST" action="../panel/clases/editar.php?id=<?php echo $row["id_class"]; ?>">


                                                <div class="form-floating mb-2">
                                                    <p>Nombre:</p>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>

                                                </div>

                                                <?php loadTeachers(); ?>
                                                <?php loadCourses(); ?>

                                                <div class="form-floating mb-2">
                                                    <p>Día:</p>
                                                    <input type="date" class="form-control" name="dia" id="dia" required>

                                                </div>

                                                <div class="form-floating mb-2">
                                                    <p>Empieza a las:</p>
                                                    <input type="time" class="form-control" name="inicio" id="inicio" required>
                                                </div>

                                                <div class="form-floating mb-2">
                                                    <p>Acaba a las:</p>
                                                    <input type="time" class="form-control" name="fin" id="fin" required>
                                                </div>

                                                <div class="form-floating mb-2">
                                                    <input type="color" class="form-control" name="color" id="color" value="#ff0000" required>
                                                    <label for="floatingInput">Color</label>
                                                </div>
                                                <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Enviar</button>


                                            </form>



                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Añadir -->
                        <div class="modal fade" id="anadir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Añadir</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="padding:50px">

                                            <form method="POST" action="../panel/clases/anadir.php">

                                                <div class="form-floating mb-2">
                                                    <p>Nombre:</p>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>

                                                </div>

                                                <?php loadTeachers(); ?>
                                                <?php loadCourses(); ?>

                                                <div class="form-floating mb-2">
                                                    <p>Día:</p>
                                                    <input type="date" class="form-control" name="dia" id="dia" required>

                                                </div>

                                                <div class="form-floating mb-2">
                                                    <p>Empieza a las:</p>
                                                    <input type="time" class="form-control" name="inicio" id="inicio" required>
                                                </div>

                                                <div class="form-floating mb-2">
                                                    <p>Acaba a las:</p>
                                                    <input type="time" class="form-control" name="fin" id="fin" required>
                                                </div>

                                                <div class="form-floating mb-2">
                                                    <input type="color" class="form-control" name="color" id="color" value="#ff0000" required>
                                                    <label for="floatingInput">Color</label>
                                                </div>
                                                <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Añadir</button>

                                            </form>



                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php

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