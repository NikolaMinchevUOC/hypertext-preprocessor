<?php



define('_UOC', 1);
require('../db_connection.php');


$query = "SELECT * FROM `teachers` WHERE 1";
$result = mysqli_query($conn, $query) or die(mysql_error());


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profesores Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a data-toggle='modal' href='#anadir' class='btn btn-sm btn-secondary'>Añadir Profesor</a>
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
                        echo "<td>" . "<a href='profesores/eliminar.php?id=" .  $row["id_teacher"] . "'class='btn btn-sm btn-danger'>Eliminar</a>" . "</td>";

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
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php echo $row['name']; ?>" required>
                                                    <label for="floatingInput">Nombre</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo $row['surname']; ?>" required>
                                                    <label for="floatingInput">Apellidos</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="nif" id="nif" placeholder="NIF" value="<?php echo $row['nif']; ?>" required>
                                                    <label for="floatingInput">NIF</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo $row['telephone']; ?>" required>
                                                    <label for="floatingInput">Teléfono</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="usuario@uoc.edu" value="<?php echo $row['email']; ?>" required>
                                                    <label for="floatingInput">Correo electrónico</label>
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

                                            <form method="POST" action="../panel/profesores/anadir.php">


                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                                                    <label for="floatingInput">Nombre</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" required>
                                                    <label for="floatingInput">Apellidos</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control" name="nif" id="nif" placeholder="NIF" required>
                                                    <label for="floatingInput">NIF</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" required>
                                                    <label for="floatingInput">Teléfono</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="usuario@uoc.edu" required>
                                                    <label for="floatingInput">Correo electrónico</label>
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