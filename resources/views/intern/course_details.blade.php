<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course: {{ $course }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            text-align: center;
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        .btn-success {
            width: 100%;
            font-size: 1.1rem;
        }

        h1 {
            color: #343a40;
        }

        .form-control {
            border-radius: 5px;
        }

        .form-select {
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Intern Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" class="d-inline">
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Course Details -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Course: {{ $course }}</h1>

        <!-- Course Table -->
        <form action="{{ route('intern.course.update', $course) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Topic</th>
                                <th>Status</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courseDetails as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->topic }}</td>
                                    <td>
                                        <select name="data[{{ $loop->index }}][status]" class="form-select">
                                            <option value="not started" {{ $detail->status == 'not started' ? 'selected' : '' }}>Not Started</option>
                                            <option value="in progress" {{ $detail->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="completed" {{ $detail->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="data[{{ $loop->index }}][comment]" class="form-control" value="{{ $detail->comment }}">
                                        <input type="hidden" name="data[{{ $loop->index }}][id]" value="{{ $detail->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
