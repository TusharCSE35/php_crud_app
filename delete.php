<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM students WHERE id = {$id}";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: home.php?delete_success=true");
        exit(); 
    } else {
        die("Query Failed: " . mysqli_error($connection));
    }
}
?>
