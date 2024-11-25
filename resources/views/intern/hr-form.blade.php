<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #111, #f39c12); /* Gradient background */
            color: #333;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            margin-bottom: 20px;
        }
        .card-body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .btn-custom {
            background-color: #1abc9c;
            color: white;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn-custom:hover {
            background-color: #16a085;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2c3e50;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Intern Dashboard</a>
        <div class="d-flex">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h1 class="text-center mb-4 text-white">HR Form</h1>

    <!-- Fill Personal Details Section -->
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Fill Personal Details</h5>
            <p>Please provide your personal details to get started.</p>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" required></textarea>
                </div>
                <button type="submit" class="btn btn-custom">Next: Fill HR Form</button>
            </form>
        </div>
    </div>

    <!-- Fill HR Form Section -->
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Fill HR Form</h5>
            <p>Provide details as requested by HR.</p>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="position" name="position" required>
                </div>
                <div class="mb-3">
                    <label for="joining_date" class="form-label">Expected Joining Date</label>
                    <input type="date" class="form-control" id="joining_date" name="joining_date" required>
                </div>
                <div class="mb-3">
                    <label for="experience" class="form-label">Previous Experience</label>
                    <textarea class="form-control" id="experience" name="experience"></textarea>
                </div>
                <div class="mb-3">
                    <label for="education" class="form-label">Highest Education</label>
                    <input type="text" class="form-control" id="education" name="education" required>
                </div>
                <button type="submit" class="btn btn-custom">Submit HR Form</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
