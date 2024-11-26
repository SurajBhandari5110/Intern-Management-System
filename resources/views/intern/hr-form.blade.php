<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Success Message -->
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="successMessage">
            Success Message
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- Header -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">HR Forms Submission</h2>
            <p class="text-muted">Please fill out the necessary details and upload the required documents.</p>
        </div>

        <!-- Form 1 -->
        <div class="card shadow mb-5">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Form 1: Document Upload</h4>
            </div>
            <div class="card-body">
                <form action="/form1/submit" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="marksheet_12th" class="form-label">12th Marksheet</label>
                            <input type="file" name="marksheet_12th" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="marksheet_10th" class="form-label">10th Marksheet</label>
                            <input type="file" name="marksheet_10th" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="adhar_card" class="form-label">Aadhar Card</label>
                            <input type="file" name="adhar_card" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="degree" class="form-label">Degree</label>
                            <input type="file" name="degree" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="sign_offerletter" class="form-label">Signed Offer Letter</label>
                            <input type="file" name="sign_offerletter" class="form-control">
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5">Submit Form 1</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Form 2 -->
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Form 2: Additional Information</h4>
            </div>
            <div class="card-body">
                <form action="/form2/submit" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="bankDetails" class="form-label">Bank Details</label>
                            <input type="text" name="bankDetails" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="collegeName" class="form-label">College Name</label>
                            <input type="text" name="collegeName" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_Placementcell" class="form-label">Phone Placement Cell</label>
                            <input type="text" name="phone_Placementcell" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="NOC" class="form-label">NOC</label>
                            <input type="file" name="NOC" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Refer_a_friend" class="form-label">Refer a Friend</label>
                            <input type="file" name="Refer_a_friend" class="form-control">
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-5">Submit Form 2</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
