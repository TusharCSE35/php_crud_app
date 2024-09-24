<?php
// Include the database connection file
include 'dbcon.php';

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    // Check if passwords match
    if ($password !== $rpassword) {
        // Show an alert for password mismatch
        echo "<script>
                alert('Passwords do not match!');
                window.location.href = 'registration.php'; // Redirect to the registration page
              </script>";
        exit();
    }

    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($connection, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Show an alert for existing username
        echo "<script>
                alert('Username already exists! Try again');
                window.location.href = 'registration.php'; // Redirect to the registration page
              </script>";
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an insert query
    $query = "INSERT INTO users (fullname, username, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $username, $hashed_password);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Registration success: Display an alert message and redirect after 2 seconds
            echo "<script>
                    alert('Registered successfully!');
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 1000); 
                  </script>";
            exit();
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Error: Could not prepare query.";
    }
}
?>
