<?php


// Comprobamos que el usuario este autenticado
if (!isset($_SESSION['email'])) {
   header('location: ../login/login.php');
}
?>
<!doctype html>
<html lang="es">

<head>
   <title>UOC Alumni · Panel</title>
   <!-- Bootstrap core CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Favicons -->
   <meta name="theme-color" content="#7952b3">
   <link rel="icon" href="https://www.uoc.edu/portal/system/modules/edu.uoc.resources/resources/common/img/icons/favicon/uoc/apple-icon-57x57.png">
   <style>
      .bd-placeholder-img {
         font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         user-select: none;
      }

      @media (min-width: 768px) {
         .bd-placeholder-img-lg {
            font-size: 3.5rem;
         }
      }
   </style>
   <style>
      body {
         font-size: .875rem;
      }

      .feather {
         width: 16px;
         height: 16px;
         vertical-align: text-bottom;
      }

      /*
         * Sidebar
         */
      .sidebar {
         position: fixed;
         top: 0;
         /* rtl:raw:
         right: 0;
         */
         bottom: 0;
         /* rtl:remove */
         left: 0;
         z-index: 100;
         /* Behind the navbar */
         padding: 48px 0 0;
         /* Height of navbar */
         box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
      }

      @media (max-width: 767.98px) {
         .sidebar {
            top: 5rem;
         }
      }

      .sidebar-sticky {
         position: relative;
         top: 0;
         height: calc(100vh - 48px);
         padding-top: .5rem;
         overflow-x: hidden;
         overflow-y: auto;
         /* Scrollable contents if viewport is shorter than content. */
      }

      .sidebar .nav-link {
         font-weight: 500;
         color: #333;
      }

      .sidebar .nav-link .feather {
         margin-right: 4px;
         color: #727272;
      }

      .sidebar .nav-link.active {
         color: #2470dc;
      }

      .sidebar .nav-link:hover .feather,
      .sidebar .nav-link.active .feather {
         color: inherit;
      }

      .sidebar-heading {
         font-size: .75rem;
         text-transform: uppercase;
      }

      /*
         * Navbar
         */
      .navbar-brand {
         padding-top: .75rem;
         padding-bottom: .75rem;
         font-size: 1rem;
         background-color: rgba(0, 0, 0, .25);
         box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
      }

      .navbar .navbar-toggler {
         top: .25rem;
         right: 1rem;
      }

      .navbar .form-control {
         padding: .75rem 1rem;
         border-width: 0;
         border-radius: 0;
      }

      .form-control-dark {
         color: #fff;
         background-color: rgba(255, 255, 255, .1);
         border-color: rgba(255, 255, 255, .1);
      }

      .form-control-dark:focus {
         border-color: transparent;
         box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
      }
   </style>
</head>

<body>
   <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">UOC</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-nav">
         <div class="nav-item text-nowrap">
         <a class="nav-link px-3" href="../login/login.php">Sign out</a>
         </div>
      </div>
   </header>
   <div class="container-fluid">
      <div class="row">
         <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
               <ul class="nav flex-column">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="calendario.php">
                        <span data-feather="home"></span>
                        Calendario
                     </a>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link" href="cursos.php">
                        <span data-feather="users"></span>
                        Cursos
                     </a>
                  </li>
               </ul>
               <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Configuración</span>
                  <a class="link-secondary" href="#" aria-label="Add a new report">
                     <span data-feather="plus-circle"></span>
                  </a>
               </h6>
               <ul class="nav flex-column mb-2">
                  <li class="nav-item">
                     <a class="nav-link" href="perfil.php">
                        <span data-feather="file-text"></span>
                        Perfil
                     </a>
                  </li>
               </ul>
            </div>
         </nav>