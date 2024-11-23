<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Leader Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard-card {
            transition: transform 0.3s ease;
        }
        .dashboard-card:hover {
            transform: translateY(-10px);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
        <h1 class="text-center mb-4">Welcome, Team Leader</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card dashboard-card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Assigned Interns</h5>
                        <p class="card-text">Manage the interns assigned to you.</p>
                        <a href="{{ route('tl.dashboard') }}" class="btn btn-primary">View Interns</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Assign New Intern</h5>
                        <p class="card-text">Add a new intern to your team.</p>
                        <a href="{{ route('tl.interns.create') }}" class="btn btn-success">Assign Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Performance Reports</h5>
                        <p class="card-text">Analyze the performance of your team.</p>
                        <a href="#" class="btn btn-info">View Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
