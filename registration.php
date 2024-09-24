<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                        <h2 class="text-center mb-4">Registration Form</h2>
                        <form action="register_process.php" method="post">
                            <div class="mb-3">
                                <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>

                            <!-- Password field with eye icon inside -->
                            <div class="mb-3 register-form-control-position">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <span class="register-input-icon" onclick="togglePassword('password', 'password-eye')">
                                    <i id="password-eye" class="fas fa-eye"></i>
                                </span>
                            </div>

                            <!-- Confirm password field with eye icon inside -->
                            <div class="mb-3 register-form-control-position">
                                <input type="password" name="rpassword" id="rpassword" class="form-control" placeholder="Confirm Password" required>
                                <span class="register-input-icon" onclick="togglePassword('rpassword', 'rpassword-eye')">
                                    <i id="rpassword-eye" class="fas fa-eye"></i>
                                </span>
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

    <!-- Font Awesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <!-- Script to toggle password visibility -->
    <script>
        function togglePassword(fieldId, eyeIconId) {
            var passwordField = document.getElementById(fieldId);
            var eyeIcon = document.getElementById(eyeIconId);

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
