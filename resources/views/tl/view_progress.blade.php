<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Progress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Intern Progress - {{ $intern->name }}</h1>

        <h3>Course: {{ ucfirst($courseName) }}</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Topic</th>
                    <th>Status</th>
                    <th>Issue</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                    <tr>
                        <td>{{ $topic->topic_name }}</td>
                        <td>
                            @if($topic->status == 'done')
                                <span class="badge bg-success">Done</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>{{ $topic->issue ?? 'No Issues' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
