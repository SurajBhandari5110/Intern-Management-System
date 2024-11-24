<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Topics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>{{ ucfirst($courseName) }} Topics</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('intern.course.submit', $courseName) }}" method="POST">
            @csrf
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
                                <select name="status[{{ $topic->id }}]" class="form-select" required>
                                    <option value="pending" {{ $topic->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="done" {{ $topic->status == 'done' ? 'selected' : '' }}>Done</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="issue[{{ $topic->id }}]" class="form-control" placeholder="Optional" value="{{ $topic->issue }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
