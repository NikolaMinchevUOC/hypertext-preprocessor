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
                            <a class="nav-link active" href="/">
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
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Notificaciones
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            @elseif (Auth::user()->role === "professor")
            <div class="container-fluid">
                <div class="row">
                    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">
                                        <span data-feather="home"></span>
                                        Dashboard <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span data-feather="file"></span>
                                        Cursos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span data-feather="shopping-cart"></span>
                                        Notificaciones
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
                                            <a class="nav-link active" href="#">
                                                <span data-feather="home"></span>
                                                Dashboard Student <span class="sr-only">(current)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <span data-feather="file"></span>
                                                Cursos
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <span data-feather="shopping-cart"></span>
                                                Notificaciones
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
