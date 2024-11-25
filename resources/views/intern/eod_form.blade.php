<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>End of Day (EOD) Update</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h4 class="mb-4">End of Day Update</h4>
        <form action="{{ route('interns.submitEOD') }}" method="POST">
            @csrf
            
            <!-- Today Section -->
            <div class="form-group">
                <label for="today">Today's Work</label>
                <textarea name="today" id="today" class="form-control" rows="5" required>{{ $eodRecord->today }}</textarea>
            </div>

            <!-- Tomorrow Section -->
            <div class="form-group">
                <label for="tomorrow">Plan for Tomorrow</label>
                <textarea name="tomorrow" id="tomorrow" class="form-control" rows="5" required>{{ $eodRecord->tomorrow }}</textarea>
            </div>

            <!-- Issue Section -->
            <div class="form-group">
                <label for="issue">Issues Faced</label>
                <textarea name="issue" id="issue" class="form-control" rows="5">{{ $eodRecord->issue }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                
                <button type="submit" class="btn btn-primary">Submit EOD</button><a href="" class="btn btn-secondary">Lets Go Back</a>
            </div>

        </form>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    End of Day (EOD) update submitted successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script to show the modal if success message is present -->
    <script>
        @if (session('success'))
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        @endif
    </script>
</body>
</html>
