<!doctype html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>UOC Alumni · Iniciar Sesión</title>

      <!-- Bootstrap core CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- Favicons -->
      <meta name="theme-color" content="#7952b3">
      <link rel="icon" href="https://www.uoc.edu/portal/system/modules/edu.uoc.resources/resources/common/img/icons/favicon/uoc/apple-icon-57x57.png">
      
      <style>
        .bd-placeholder-img{font-size:1.125rem;text-anchor:middle;-webkit-user-select:none;-moz-user-select:none;user-select:none}@media (min-width:768px){.bd-placeholder-img-lg{font-size:3.5rem}}body,html{height:100%}body{display:flex;align-items:center;padding-top:40px;padding-bottom:40px;background-color:#f5f5f5}.form-signin{width:100%;max-width:330px;padding:15px;margin:auto}.form-signin .checkbox{font-weight:400}.form-signin .form-floating:focus-within{z-index:2}.form-signin input[type=email]{margin-bottom:-1px;border-bottom-right-radius:0;border-bottom-left-radius:0}.form-signin input[type=password]{margin-bottom:10px;border-top-left-radius:0;border-top-right-radius:0}
      </style>
  </head>
    <body class="text-center">
      <main class="form-signin">
        <form method="POST" action="authenticate.php">
          <img class="mb-4" src="https://www.uoc.edu/portal/system/modules/edu.uoc.presentations/resources/img/branding/logo-uoc-default.png" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>

          <div class="form-floating">
            <input type="email" class="form-control" name="email" id="email" placeholder="usuario@uoc.edu">
            <label for="floatingInput">Correo electrónico</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
            <label for="floatingPassword">Contraseña</label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Acceder</button>
          <?php 
              if ($_GET['error']){
                echo "<hr><div class='alert alert-danger' role='alert'>
                El usuario o la contraseña es incorrecto.
              </div>";
              } 
          ?>
          <p class="mt-5 mb-3 text-muted">&copy; UOC</p>
        </form>
      </main>
    </body>
</html>

