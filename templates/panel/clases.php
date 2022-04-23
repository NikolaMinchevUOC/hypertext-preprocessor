<?php 

    session_start();  
    
    define('_UOC', 1);  
    require('../db_connection.php');


    $query = "SELECT * FROM `class` WHERE 1";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Clases</h1>
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
                            while($row = $result->fetch_assoc()) {
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
                    <input type="text" class="form-control" name="id_teacher" id="id_teacher" placeholder="ID Profesor" value="<?php  echo $row['id_teacher']; ?>" required>
                    <label for="floatingInput">ID Profesor</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="id_course" id="id_course" placeholder="ID Curso" value="<?php  echo $row['id_course']; ?>" required>
                    <label for="floatingInput">ID Curso</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="id_schedule" id="id_schedule" placeholder="ID Schedule" value="<?php  echo $row['id_schedule']; ?>" required>
                    <label for="floatingInput">ID Schedule</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="tel" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php  echo $row['name']; ?>" required>
                    <label for="floatingInput">Nombre</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="<?php  echo $row['color']; ?>" required>
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
                    <input type="text" class="form-control" name="id_teacher" id="id_teacher" placeholder="ID Profesor" required>
                    <label for="floatingInput">ID Profesor</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="id_course" id="id_course" placeholder="ID Curso" required>
                    <label for="floatingInput">ID Curso</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="id_schedule" id="id_schedule" placeholder="ID Schedule" required>
                    <label for="floatingInput">ID Schedule</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="tel" class="form-control" name="name" id="name" placeholder="Nombre" required>
                    <label for="floatingInput">Nombre</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="color" id="color" placeholder="Color" required>
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
                        }else {
                            echo "No hay resultados.";
                        }
                        $conn->close();
                        ?>
                     </tbody>
                  </table>
               </div>


<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
