<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="registration-page">
    <!-- Title Section -->
    <div class="welcome-title">Welcome to Student Management System</div>

    <!-- Form Container -->
    <div class="container registration-form">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Registration Form</h2>
                        <form action="register_process.php" method="post">
                            <div class="mb-3">
                                <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="rpassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="login.php">Already a member? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
