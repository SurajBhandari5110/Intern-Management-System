<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Intern Performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Track Intern Performance</h1>

        <!-- Filter Form -->
        <form action="{{ route('tl.track.performance') }}" method="GET" class="mb-4">
            <div class="row">
                <!-- Select Intern -->
                <div class="col-md-4">
                    <label for="intern_id" class="form-label">Select Intern</label>
                    <select name="intern_id" id="intern_id" class="form-select" required>
                        <option value="" disabled selected>Choose an Intern</option>
                        @foreach($interns as $assignment)
                            <option value="{{ $assignment->intern->id }}" {{ request('intern_id') == $assignment->intern->id ? 'selected' : '' }}>
                                {{ $assignment->intern->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Select Course -->
                <div class="col-md-4">
                    <label for="course" class="form-label">Select Course</label>
                    <select name="course" id="course" class="form-select" required>
                        <option value="" disabled selected>Choose a Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course }}" {{ request('course') == $course ? 'selected' : '' }}>
                                {{ ucfirst($course) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="col-md-4 align-self-end">
                    <button type="submit" class="btn btn-primary">Track Performance</button>
                </div>
            </div>
        </form>

        <!-- Intern Study Records Table -->
        @if($records)
            <h2 class="mt-4">Intern Performance Details</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Topic ID</th>
                        <th>Topic</th>
                        <th>Status</th>
                        <th>Comment</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->topic_id }}</td>
                            <td>{{ $record->topic }}</td>
                            <td>{{ $record->status ?? 'No Status' }}</td>
                            <td>{{ $record->comment ?? 'No Comments' }}</td>
                            <td>{{ $record->updated_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No records found for the selected intern and course.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
