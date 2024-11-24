<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Intern to Project</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h4 class="mb-4">Assign Intern to Project</h4>
        <form action="{{ route('tl.project_team.store') }}" method="POST">@csrf
      <!-- Laravel CSRF protection token -->

    <!-- Project selection dropdown -->
    <div class="mb-3">
        <label for="project_id" class="form-label">Select Project</label>
        <select name="project_id" id="project_id" class="form-select" required>
            <option value="" disabled selected>Choose a project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- TL ID (hidden, automatically assigned) -->
    <input type="hidden" name="tl_id" value="{{ Auth::user()->id }}">

    <!-- Intern selection dropdown -->
    <div class="mb-3">
        <label for="intern_id" class="form-label">Select Intern</label>
        <select name="intern_id" id="intern_id" class="form-select" required>
            <option value="" disabled selected>Choose an intern</option>
            @foreach($interns as $intern)
                <option value="{{ $intern->id }}">{{ $intern->name }} ({{ $intern->email }})</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-success">Assign Intern</button>
</form>
    </div>

    <!-- Optional: Bootstrap JS (for dropdown functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
