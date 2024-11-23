<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Intern Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/future-proofing') }}">Future-Proofing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="display-4">Welcome to the Intern Management System</h1>
                <p class="lead mt-4">
                    Our Intern Management System is designed to streamline the onboarding process, enhance communication between interns and team leaders (TLs), and ensure a smooth transition for new interns into their roles.
                </p>
            </div>
        </div>

        <!-- Project Benefits Section -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Why Use Our System?</h2>
                <p>
                    Managing interns in a startup can be challenging. Our system helps address common problems faced by new interns, including lack of clear communication with team leaders, understanding tasks, and tracking their progress.
                    With this system, TLs can easily assign tasks, monitor performance, and foster a productive learning environment.
                </p>
            </div>
        </div>

        <!-- Video Section -->
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <h2>How to Use the System</h2>
                <div class="embed-responsive embed-responsive-16by9 mt-3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YOUR_VIDEO_ID" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 p-4 text-center">
        &copy; 2024 Intern Management System. All rights reserved.
    </footer>

    <!-- Bootstrap JS (Optional but recommended for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
