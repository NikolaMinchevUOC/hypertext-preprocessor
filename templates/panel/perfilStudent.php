<?php



define('_UOC', 1);
require('../db_connection.php');

$email = $_SESSION['email'];

$query = "SELECT * FROM `students` WHERE email = '{$email}'";
$result = mysqli_query($conn, $query) or die(mysql_error());
$value = mysqli_fetch_assoc($result);


?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Editar Perfil Student</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
   </div>

   <div class="modal-body">
      <div class="row" style="padding:50px">
         <form method="POST" action="perfil/editar-student.php?id=<?php echo $value["id"]; ?>">
            <div class="form-floating mb-2">
               <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php echo $value["name"]; ?>" required>
               <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mb-2">
               <input type="text" class="form-control" name="surname" id="surname" placeholder="Apellido" value="<?php echo $value["surname"]; ?>" required>
               <label for="floatingInput">Apellido</label>
            </div>
            <div class="form-floating mb-2">
               <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Teléfono" value="<?php echo $value["telephone"]; ?>" required>
               <label for="floatingInput">Teléfono</label>
            </div>
            <div class="form-floating mb-2">
               <input type="text" class="form-control" name="nif" id="nif" placeholder="NIF" value="<?php echo $value["nif"]; ?>" required>
               <label for="floatingInput">NIF</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Editar</button>
         </form>
      </div>
   </div>

</main>