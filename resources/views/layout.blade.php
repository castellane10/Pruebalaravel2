<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #f8bbd0; 
        }
        .navbar-brand,
        .nav-link {
            color: #880e4f !important; 
        }
        .nav-link:hover {
            color: #ad1457 !important; 
        }
        .nav-item.active .nav-link {
            color: #ad1457 !important; 
        }
        .navbar-toggler {
            border-color: #880e4f; 
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23880e4f' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%288, 0, 0, 0.5%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Mi Proyecto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/requests">Ver Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/requests/create">Crear Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/assignments">Ver Assignments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/assignments/create">Crear Assignment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>