<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') - UOC</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">UOC</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('login.destroy') }}">Sign out</a>
            </li>
        </ul>
    </nav>

    @if (Auth::user()->role === "admin")
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin">
                                <span data-feather="home"></span>
                                Dashboard Admin <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin-courses">
                                <span data-feather="file"></span>
                                Cursos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin-schedule">
                                <span data-feather="file"></span>
                                Schedule
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin-clases">
                                <span data-feather="file"></span>
                                Clases
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin-enrolments">
                                <span data-feather="file"></span>
                                Enrollments
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/admin-works">
                                <span data-feather="file"></span>
                                Works
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/admin-exams">
                                <span data-feather="file"></span>
                                Exams
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin-percentage">
                                <span data-feather="file"></span>
                                Percentage
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin-notification">
                                <span data-feather="file"></span>
                                Notifications
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-column mb-2">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                            <span>Gestión de Cuenta </span>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-text-bottom" aria-hidden="true">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg> Perfil
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            @elseif (Auth::user()->role === "profesor")
            <div class="container-fluid">
                <div class="row">
                    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/profesor">
                                        <span data-feather="home"></span>
                                        Dashboard Profesor <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav flex-column mb-2">
                                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                    <span>Gestión de Cuenta </span>
                                </h6>
                                <li class="nav-item">
                                    <a class="nav-link" href="/profile">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-text-bottom" aria-hidden="true">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg> Perfil
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    @elseif (Auth::user()->role === "student")
                    <div class="container-fluid">
                        <div class="row">
                            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                                <div class="sidebar-sticky">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="/student">
                                                <span data-feather="home"></span>
                                                Dashboard Student <span class="sr-only">(current)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/student-calendar">
                                                <span data-feather="file"></span>
                                                Calendario
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/student-enrolments">
                                                <span data-feather="file"></span>
                                                Enrollments
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/student-mensajes">
                                                <span data-feather="file"></span>
                                                Mensajes
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <span data-feather="shopping-cart"></span>
                                                Notificaciones
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav flex-column mb-2">
                                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                            <span>Gestión de Cuenta </span>
                                        </h6>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/profile">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-text-bottom" aria-hidden="true">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg> Perfil
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            @endif

                            @yield('navbar')

                            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                                    <h1 class="h2">@yield('h1')</h1>
                                    <div class="btn-toolbar mb-2 mb-md-0">
                                        <div class="btn-group mr-2">
                                            <button class="btn btn-sm btn-outline-secondary">Botón</button>
                                            <button class="btn btn-sm btn-outline-secondary">Botón Secundario</button>
                                        </div>
                                    </div>
                                </div>

                                @yield('content')

                            </main>
                        </div>
                    </div>

                    <!-- Bootstrap core JavaScript
    ================================================== -->
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> <!-- Icons -->
                    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
                    <script>
                        feather.replace()
                    </script>

</body>

</html>
