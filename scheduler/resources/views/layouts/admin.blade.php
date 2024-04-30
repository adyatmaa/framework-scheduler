<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"
        integrity="sha256-73rO2g7JSErG8isZXCse39Kf5yGuePgjyvot/8cRCNQ=" crossorigin="anonymous"></script>

    <style>
        main {
            min-height: 92vh;
            font-family: 'Montserrat';
        }

        header,
        footer {
            position: relative;
            width: 100%;
            font-family: 'Montserrat';
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid ">
                <a class="navbar-brand mx-3" href="{{ route('admin_dashboard') }}">MyCourses</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin_dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin_participant') }}">Participant</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Courses
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin_course') }}">Courses</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin_inputCourse') }}">Create a course</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <a href="{{ route('logout') }}" class="btn btn-danger mx-3">Logout</a>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="p-3 bg-dark">
        <p class="text-center text-white">
            @2024
        </p>
    </footer>
    @if (session('salah'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('salah') }}",
            });
        </script>
    @elseif(session('deleteSuccess'))
        <script>
            Swal.fire({
                title: "Deleted!",
                text: "{{ session('deleteSuccess') }}",
                icon: "success"
            });
        </script>
    @elseif(session('makeCourse'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('makeCourse') }}",
                icon: "success"
            });
        </script>
    @elseif(session('editCourse'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('editCourse') }}",
                icon: "success"
            });
        </script>
    @elseif(session('loginSuccess'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "You have logged in",
                icon: "success",
            });
        </script>
    @elseif(session('logout'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('logout') }}",
                icon: "success"
            });
        </script>
    @endif
</body>

</html>
