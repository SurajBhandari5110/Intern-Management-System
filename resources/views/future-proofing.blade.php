<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling for the future plans page */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #1c1c1c, #17a2b8);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            color: #1c1c1c;
            border-radius: 20px;
            padding: 30px;
            max-width: 800px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h1, h2 {
            text-align: center;
            color: #17a2b8;
            margin-bottom: 20px;
            font-weight: bold;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .btn {
            display: block;
            margin: 20px auto;
            background-color: #17a2b8;
            color: white;
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 1rem;
        }

        .btn:hover {
            background-color: #1c1c1c;
            color: #17a2b8;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Future Plans for Our Project</h1>
        <p class="lead">
            At <strong>CodeFatGya</strong>, we are committed to evolving our <strong>Intern Management System</strong> into a robust, scalable platform that meets the dynamic needs of startups, HR teams, and enterprises. Our vision is to empower organizations to manage their workforce effectively and efficiently.
        </p>
        <h2>Key Goals:</h2>
        <ul>
            <li>
                <strong>1. AI-Powered Recommendations:</strong> Integrate AI to suggest task assignments based on intern skillsets and performance data.
            </li>
            <li>
                <strong>2. Advanced Analytics Dashboard:</strong> Provide real-time insights into intern productivity, project milestones, and team efficiency.
            </li>
            <li>
                <strong>3. HR Integration:</strong> Expand capabilities to include employee lifecycle management, recruitment workflows, and performance reviews.
            </li>
            <li>
                <strong>4. Mobile App Development:</strong> Launch a mobile-friendly version of the platform to allow TLs and interns to manage tasks and collaborate on the go.
            </li>
            <li>
                <strong>5. Scalable API Architecture:</strong> Develop robust APIs to integrate with third-party tools like Slack, Google Workspace, and project management platforms.
            </li>
            <li>
                <strong>6. Customization for Enterprises:</strong> Introduce customizable workflows tailored to the unique requirements of different organizations.
            </li>
        </ul>
        <h2>What Drives Us?</h2>
        <p>
            We believe in fostering innovation and staying ahead of industry trends. Our commitment is to empower startups and enterprises alike by providing a seamless and productive work environment.
        </p>
        <a href="{{ url('/') }}" class="btn">Back to Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
