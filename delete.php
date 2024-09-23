<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the student from the database
    $query = "DELETE FROM students WHERE id = {$id}";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect to index.php with success message
        header("Location: index.php?delete_success=true");
        exit(); // Make sure the script stops executing after the redirect
    } else {
        die("Query Failed: " . mysqli_error($connection));
    }
}
?>
