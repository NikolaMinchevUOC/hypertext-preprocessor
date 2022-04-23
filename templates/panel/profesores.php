<?php

session_start();

define('_UOC', 1);
require('../db_connection.php');


$query = "SELECT * FROM `teachers` WHERE 1";
$result = mysqli_query($conn, $query) or die(mysql_error());


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profesores</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Añadir Profesor</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">NIF</th>
                    <th scope="col">Correo Electrónico</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Recorremos los resultados
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_teacher"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["surname"] . "</td>";
                        echo "<td>" . $row["telephone"] . "</td>";
                        echo "<td>" . $row["nif"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";

                        echo "<td>" . "<a data-toggle='modal' href='#editar_" . $row["id_teacher"] . "'class='btn btn-sm btn-primary'>Editar</a>" . "</td>";
                        echo "<td>" . "<a href='#eliminar' class='btn btn-sm btn-danger'>Eliminar</a>" . "</td>";

                ?>

                        <!-- Modal Editar-->
                        <div class="modal fade" id="editar_<?php echo $row["id_teacher"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Editar</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="padding:50px">

                                            <form method="POST" action="../panel/profesores/editar.php?id=<?php echo $row['id_teacher']; ?>">

                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="text" id="nombre" value="<?php echo $row['name']; ?>">
                                                    <label for="floatingInput">Nombre</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="text" id="apellido" value="<?php echo $row['surname']; ?>">
                                                    <label for="floatingInput">Apellido</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="text" id="telefono" value="<?php echo $row['telephone']; ?>">
                                                    <label for="floatingInput">Teléfono</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="text" id="nif" value="<?php echo $row['nif']; ?>">
                                                    <label for="floatingInput">NIF</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="text" id="email" value="<?php echo $row['email']; ?>">
                                                    <label for="floatingInput">Correo Electrónico</label>
                                                </div>
                                                <button class="w-100 btn btn-md btn-primary" type="submit">Enviar</button>
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
                    echo "0 results";
                }
                $conn->close();

                ?>
            </tbody>
        </table>
    </div>