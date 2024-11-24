<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Study Material</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Assign Study Material to Interns</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form to Assign Course -->
        <form action="{{ route('tl.assign.course') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="intern_id" class="form-label">Select Intern</label>
                <select name="intern_id" id="intern_id" class="form-select" required>
                    <option value="" disabled selected>Choose an intern</option>
                    @foreach($interns as $intern)
                        <option value="{{ $intern->id }}">{{ $intern->name }} ({{ $intern->email }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="table_name" class="form-label">Select Study Material</label>
                <select name="table_name" id="table_name" class="form-select" required>
                    <option value="" disabled selected>Choose a course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->table_name }}">{{ $course->table_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
</body>
</html>
