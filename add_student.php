<?php include('dbcon.php'); ?>
<?php include('header.php'); ?>

<div class="container mt-4">
    <div id="alertMessage" class="alert alert-success">
        Student added successfully.
    </div>

    <div class="border p-4 bg-white" style="border-radius: 10px; width: 1000px; margin: auto; --bs-bg-opacity: .2;">
        <h2 class="text-center" style="color: white;">ADD STUDENT</h2>
        <form id="studentForm" action="add_student.php" method="POST" class="form-container">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter first name" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter last name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" required>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <a href="home.php" class="btn btn-secondary me-5">
                    <i class="bi bi-x"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary" id="addStudentBtn">
                    <i class="bi bi-plus"></i> Add Student
                </button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $age = $_POST['age'];

            $query = "INSERT INTO students (first_name, last_name, email, phone, age) VALUES ('$firstName', '$lastName', '$email', '$phone', '$age')";
            if (mysqli_query($connection, $query)) {
                echo "
                <script>
                    document.getElementById('alertMessage').style.display = 'block';
                    
                    setTimeout(function() {
                        window.location.href = 'home.php';
                    }, 2000);
                </script>
                ";
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($connection) . "</div>";
            }
        }
        ?>
    </div>
</div>

<?php include('footer.php'); ?>
