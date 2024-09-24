<?php
// Include the database connection file
include 'dbcon.php';
session_start(); // Start session

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "s", $username);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        // Check if user exists and verify the password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username']; // Set session variable
            echo "<script>
                    alert('Successfully Logged In!');
                    window.location.href = 'home.php'; // Redirect to home page
                  </script>";
            exit();
        } else {
            // Alert for invalid username or password
            echo "<script>
                    alert('Username and Password do not match! Try again.');
                    window.location.href = 'login.php'; // Redirect to login page
                  </script>";
            exit();
        }
    } else {
        echo "Error: Could not prepare query.";
    }
}
?>
