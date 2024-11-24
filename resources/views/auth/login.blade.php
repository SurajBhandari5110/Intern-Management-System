<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Intern Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background: linear-gradient(to right, #111, #f39c12); /* Matching the Hero Section */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        a {
            text-decoration: none;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #111;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .navbar-brand {
            color: #fff !important;
            font-weight: 700;
            font-size: 1.8rem;
            text-transform: uppercase;
        }
        .navbar-brand:hover {
            color: #f39c12 !important;
        }
        .nav-link {
            color: #fff !important;
            font-size: 1rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .nav-link:hover {
            color: #f39c12 !important;
            transform: scale(1.1);
        }

        /* Card Styles */
        .card {
            background-color: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .card-header {
            background-color: #f39c12;
            color: #fff;
            font-size: 1.5rem;
            text-align: center;
            padding: 15px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .btn-primary {
            background-color: #f39c12;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #fff;
            color: #111;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-text {
            font-size: 0.85rem;
            color: #555;
            text-align: center;
            margin-top: 10px;
        }

        a {
            color: #f39c12;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">IMS</a>
        </div>
    </nav>

    <!-- Login Section -->
    <div class="d-flex justify-content-center align-items-center w-100">
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="form-text">
                            You have 5 attempts. Exceeding this will lock you out for 10 minutes.
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <p class="form-text mt-3">
                    <a href="{{ url('/') }}">Back to Home</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
