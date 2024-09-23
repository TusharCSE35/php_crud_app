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

<body class="log-reg-page">
    <!-- Title Section -->
    <div class="welcome-title">Student Information System</div>

    <!-- Form Container -->
    <div class="container log-reg-form">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login Form</h2>
                        <form action="login_process.php" method="post">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="registration.php">Not a member? Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
