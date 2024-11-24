<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #111, #f39c12); /* Gradient background */
            color: #333;
            font-family: 'Poppins', sans-serif;
        }
        .profile-card {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .dashboard-card .card-body {
            background-color: black; /* Light blue background */
            color: white;
            border-radius: 10px;
            padding: 30px;
        }
        .dashboard-card .card-title {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .dashboard-card .card-text {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }
        .dashboard-card .btn {
            background-color: #fff;
            color: #3498db;
            border: none;
            font-weight: bold;
        }
        .dashboard-card .btn:hover {
            background-color: #2980b9; /* Darker blue on hover */
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        /* Align the assigned study material card in the center */
        .dashboard-link-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }
        /* Adjust card width */
        .dashboard-card {
            width: 70%; /* Increased width */
            max-width: 600px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2c3e50;"> <!-- Darker color -->
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
    <h1 class="text-center mb-4 text-white">Welcome, Intern</h1>

    <!-- Profile Card -->
    <div class="profile-card text-center">
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
    <div class="dashboard-link-container">
        <div class="card dashboard-card shadow">
            <div class="card-body">
                <h5 class="card-title">Assigned Study Material</h5>
                <p class="card-text">
                    Your Team Lead has assigned you the following roadmap for your learning journey. Follow the steps carefully to complete each milestone and get the most out of your internship experience.
                </p>
                <a href="{{ route('intern.assigned.courses') }}" class="btn btn-primary">View Courses</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
