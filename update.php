<?php include('dbcon.php'); ?>
<?php include('header.php'); ?>

<div class="container mt-4">
    <div id="alertMessage" class="alert alert-success" style="display: none;">
        Student updated successfully.
    </div>

    <div class="border p-4" style="border-radius: 10px; width: 1000px; margin: auto;">
        <h2 class="text-center">EDIT STUDENT</h2>

        <?php
        if (isset($_GET['id'])) {
            $student_id = $_GET['id'];

            $query = "SELECT * FROM students WHERE id = $student_id";
            $result = mysqli_query($connection, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $student = mysqli_fetch_assoc($result);
            } else {
                echo "<div class='alert alert-danger'>Student not found.</div>";
                exit();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $age = $_POST['age'];

            $updateQuery = "UPDATE students SET first_name='$firstName', last_name='$lastName', email='$email', phone='$phone', age='$age' WHERE id=$student_id";
            if (mysqli_query($connection, $updateQuery)) {
                echo "
                <script>
                    document.getElementById('alertMessage').style.display = 'block';
                    
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 2000);
                </script>
                ";
            } else {
                echo "<div class='alert alert-danger'>Error updating student: " . mysqli_error($connection) . "</div>";
            }
        }
        ?>

        <form id="studentForm" action="update.php?id=<?php echo $student_id; ?>" method="POST" class="form-container">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo $student['first_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $student['last_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $student['phone']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $student['age']; ?>" required>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <a href="index.php" class="btn btn-secondary me-5">
                    <i class="bi bi-x"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary" id="saveChangesBtn">
                    <i class="bi bi-plus"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>
