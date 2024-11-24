<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigned Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Assigned Courses</h1>

        <ul class="list-group">
            @foreach($assignedCourses as $course)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ ucfirst($course->table_name) }}
                    <a href="{{ route('intern.course.view', $course->table_name) }}" class="btn btn-primary btn-sm">View Topics</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
