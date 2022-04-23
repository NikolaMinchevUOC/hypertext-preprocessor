<?php 

    session_start();  
    
    define('_UOC', 1);  
    require('../db_connection.php');


    $query = "SELECT * FROM `courses` WHERE 1";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    
      
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Cursos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a data-toggle='modal' href='#anadir'class='btn btn-sm btn-secondary'>Añadir Curso</a>
        </div>
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
                           <th scope="col">Activo</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        // Recorremos los resultados
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                    echo "<td>" . $row["id_course"] . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["description"] . "</td>";
                                    echo "<td>" . $row["date_start"] . "</td>";
                                    echo "<td>" . $row["date_end"] . "</td>";
                                    echo "<td>" . $row["active"] . "</td>";

                                    echo "<td>" . "<a data-toggle='modal' href='#editar_" . $row["id_course"] . "'class='btn btn-sm btn-primary'>Editar</a>" . "</td>";
                                    echo "<td>" . "<a href='cursos/eliminar.php?id=" .  $row["id_course"] . "'class='btn btn-sm btn-danger'>Eliminar</a>" . "</td>";

                                    ?>

  <!-- Modal Editar-->
  <div class="modal fade" id="editar_<?php echo $row["id_course"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Editar</h4>
        </div>
        <div class="modal-body">
            <div class="row" style="padding:50px">

            <form method="POST" action="../panel/cursos/editar.php?id=<?php echo $row["id_course"]; ?>">


                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php  echo $row['name']; ?>" required>
                    <label for="floatingInput">Nombre</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" value="<?php  echo $row['description']; ?>" required>
                    <label for="floatingInput">Descripción</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de Inicio" value="<?php  echo $row['date_start']; ?>" required>
                    <label for="floatingInput">Fecha de Inicio</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="tel" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha de Fin" value="<?php  echo $row['date_end']; ?>" required>
                    <label for="floatingInput">Fecha de Fin</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="active" id="active" placeholder="Activo" value="<?php  echo $row['active']; ?>" required>
                    <label for="floatingInput">Activo</label>
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

            <form method="POST" action="../panel/cursos/anadir.php">


                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                    <label for="floatingInput">Nombre del Curso</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Apellidos" required>
                    <label for="floatingInput">Descripción</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="tel" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de Inicio" value="2022-05-15" required>
                    <label for="floatingInput">Fecha de Inicio</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="tel" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha de Fin" value="2022-05-15" required>
                    <label for="floatingInput">Fecha de Fin</label>
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
                        }else {
                            echo "No hay resultados.";
                        }
                        $conn->close();
                        ?>
                     </tbody>
                  </table>
               </div>


<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
