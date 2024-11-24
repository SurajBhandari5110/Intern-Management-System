<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-card {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
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
    <h1 class="text-center mb-4">Welcome, Intern</h1>

    <!-- Profile Card -->
    <div class="profile-card bg-white text-center">
        @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="profile-image">
        @else
            <img src="https://cdn-icons-png.flaticon.com/512/180/180658.png" alt="Default Profile" class="profile-image">
        @endif
        <h3 class="mb-3">{{ $user->name }}</h3>
        <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
        <p class="text-muted mb-0">Role: Intern</p>
    </div>

    <!-- Dashboard Links -->
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card dashboard-card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Assigned Study Material</h5>
                    <p class="card-text">Access courses assigned by your Team Lead.</p>
                    <a href="{{ route('intern.assigned.courses') }}" class="btn btn-primary">View Courses</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Tasks</h5>
                    <p class="card-text">View and manage your assigned tasks.</p>
                    <a href="{{ route('intern.tasks') }}" class="btn btn-success">View Tasks</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Progress Reports</h5>
                    <p class="card-text">Track your performance and progress.</p>
                    <a href="{{ route('intern.progress') }}" class="btn btn-info">View Reports</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
