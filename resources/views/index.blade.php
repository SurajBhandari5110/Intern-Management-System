<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
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

        /* Hero Section */
        .hero-section {
            background: linear-gradient(to right, #111, #f39c12);
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://source.unsplash.com/1920x1080/?teamwork,office');
            background-size: cover;
            background-position: center;
            filter: brightness(0.4);
            z-index: -1;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        .hero-section p {
            font-size: 1.3rem;
            margin-top: 20px;
        }
        .hero-section .btn {
            margin-top: 30px;
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 50px;
            background: #f39c12;
            color: #111;
            border: none;
            transition: all 0.3s ease;
        }
        .hero-section .btn:hover {
            background-color: #fff;
            color: #111;
            transform: translateY(-5px);
        }

        /* Content Section */
        .content-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #111;
        }
        .content-section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        /* Features Section */
        .features-section {
            background: #f9f9f9;
            padding: 60px 0;
        }
        .features-section .feature-box {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .features-section .feature-box:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
        .features-section .feature-icon {
            font-size: 2.5rem;
            color: #f39c12;
        }
        .features-section h3 {
            font-size: 1.5rem;
            margin-top: 15px;
        }
        .features-section p {
            color: #666;
            margin-top: 10px;
        }

        /* Footer */
        footer {
            background-color: #111;
            color: #fff;
            padding: 30px 0;
            font-size: 0.9rem;
        }
        footer a {
            color: #f39c12;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">IMS</a>
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

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Welcome to Intern Management System</h1>
        <p>Revolutionizing the way interns and leaders communicate, collaborate, and grow.</p>
        <a href="{{ url('/login') }}" class="btn">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row text-center">
            <h2>Why Choose IMS?</h2>
            <p>Explore the powerful features of our system designed for seamless productivity and growth.</p>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">📚</div>
                    <h3>Skill Roadmaps</h3>
                    <p>Create tailored learning paths with lectures and study materials.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">📊</div>
                    <h3>Performance Tracking</h3>
                    <p>Monitor progress with detailed reports and EOD submissions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">🛠️</div>
                    <h3>Admin Tools</h3>
                    <p>Direct insights into project progress and employee performance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p>&copy; 2024 Intern Management System. All rights reserved By: Acelucid-CodeFatgya Team | <a href="https://www.linkedin.com/in/suraj-bhandari-1aa31323a/">Contact Developer</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
