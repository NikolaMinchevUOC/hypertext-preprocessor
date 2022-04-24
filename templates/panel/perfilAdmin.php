<?php



define('_UOC', 1);
require('../db_connection.php');

$email = $_SESSION['email'];

$query = "SELECT * FROM `users_admin` WHERE email = '{$email}'";
$result = mysqli_query($conn, $query) or die(mysql_error());
$value = mysqli_fetch_assoc($result);


?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Editar Perfil Admin</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
   </div>

   <div class="modal-body">
      <div class="row" style="padding:50px">
         <form method="POST" action="perfil/editar-admin.php?id=<?php echo $value["id_user_admin"]; ?>">
            <div class="form-floating mb-2">
               <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de Usuario" value="<?php echo $value["username"]; ?>" required>
               <label for="floatingInput">Nombre de Usuario</label>
            </div>
            <div class="form-floating mb-2">
               <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php echo $value["name"]; ?>" required>
               <label for="floatingInput">Nombre</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Editar</button>
         </form>
      </div>
   </div>

</main>