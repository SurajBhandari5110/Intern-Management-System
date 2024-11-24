<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
        }

        .card {
            border-radius: 15px;
            background: linear-gradient(to bottom right, #f8f9fa, #e9ecef);
        }

        /* Navbar */
        .navbar {
            background-color: #1c1c1c;
        }
        .navbar-brand {
            color: #f8f9fa !important;
            font-weight: bold;
            text-transform: uppercase;
        }
        .navbar-brand:hover {
            color: #17a2b8 !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Intern Management</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- About Us Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">About Us</h2>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card p-4 shadow-lg">
                    <p class="lead">
                        Our Intern Management System, developed by the <strong>CodeFatGya</strong> team, aims to optimize workflows between interns and Team Leaders (TLs). This system not only bridges communication gaps but also simplifies task assignments and performance tracking.
                    </p>
                    <p>
                        <strong>Company Name:</strong> 
                        <a href="https://acelucid.com/" target="_blank">Acelucid</a>
                    </p>
                    <p>
                        <strong>Team Members:</strong>
                        <ul>
                            <li>Suraj Bhandari</li>
                            <li>Birobin</li>
                            <li>Akash</li>
                            <li>Gaurav</li>
                        </ul>
                    </p>
                    <p>
                        Our platform is tailored for <strong>Acelucid</strong> to enhance operations, helping interns and TLs collaborate effectively. It is also designed to expand into managing employee-HR relationships seamlessly.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
