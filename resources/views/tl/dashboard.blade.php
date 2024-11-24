<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Leader Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-card {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Team Leader Dashboard</a>
            <div class="d-flex">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Profile Card -->
    <div class="container my-5">
        <div class="profile-card bg-white text-center">
            @if($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="profile-image">
            @else
                <img src="https://cdn-icons-png.flaticon.com/512/10841/10841518.png" alt="Default Profile" class="profile-image">
            @endif
            <h3 class="mb-3">{{ $user->name }}</h3>
            <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="text-muted mb-0">Role: Team Leader</p>
        </div>
    </div>

    <!-- Assigned Interns -->
    <div class="container my-5">
        <h4>Assigned Interns</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Assigned On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($assignments as $assignment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $assignment->intern->name }}</td>
                        <td>{{ $assignment->intern->email }}</td>
                        <td>{{ $assignment->created_at->format('d-m-Y') }}</td>
                        <td>
                            <!-- Remove Intern Button -->
                            <form action="{{ route('tl.interns.destroy', $assignment->intern->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove Intern</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No interns assigned yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Assign New Intern -->
        <h4 class="mt-5">Assign New Intern</h4>
        <form action="{{ route('tl.interns.store') }}" method="POST">
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
            <button type="submit" class="btn btn-primary">Assign Intern</button>
        </form>
    </div>

    <!-- Study Material Block -->
    <div class="container my-5">
        <h3>Study Material</h3>
        
        @if($materials->isEmpty())
            <p>No study materials available.</p>
        @else
            <form id="studyMaterialForm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach ($materials as $material)
        <tr>
            <td>{{ $material->table_name }}</td>
            <td>
                <!-- View Button -->
                <a href="{{ route('study.material.view', ['table_name' => $material->table_name]) }}" class="btn btn-primary btn-sm">View</a>

                <!-- Send to Intern Button -->
                @if ($assignments->isEmpty())
                    <span>No interns assigned to you.</span> <!-- Show a message if no interns are assigned -->
                @else
                    @foreach ($assignments as $assignment)
                        <form action="{{ route('send.study.material') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="table_name" value="{{ $material->table_name }}">
                            <input type="hidden" name="intern_id" value="{{ $assignment->intern->id }}"> <!-- Intern ID -->
                            <button type="submit" class="btn btn-success btn-sm">Send to {{ $assignment->intern->name }}</button>
                        </form>
                    @endforeach
                @endif
            </td>
        </tr>
    @endforeach
</tbody>

                </table>
            </form>
        @endif
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
