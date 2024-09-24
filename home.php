<?php
session_start();
include('header.php');
include('dbcon.php');
 // Start the session

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy(); // Destroy the session
    header("Location: home.php"); // Redirect to the home page
    exit();
}
?>

<?php if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true'): ?>
    <div id="alertMessage">
        Student deleted successfully!
    </div>
<?php endif; ?>

<!-- Row for ALL STUDENTS, Search Bar, and ADD STUDENT button -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 style="color: white;">ALL STUDENTS</h2>

    <div class="text-center flex-grow-1">
        <form action="home.php" method="GET" class="d-flex justify-content-center">
            <input type="text" name="search" class="form-control" placeholder="Search" required style="width: 300px;"> <!-- Adjusted width -->
            <button type="submit" class="btn btn-secondary ml-2">
                <i class="bi bi-search"></i> <!-- Search icon -->
            </button>
        </form>
    </div>

    <?php if (isset($_SESSION['username'])): ?>
        <form action="add_student.php" method="GET">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-plus"></i> ADD STUDENT
            </button>
        </form>
    <?php else: ?>
        <div class="text-right">
            <a href="login.php" class="btn btn-success btn-sm">
                <i class="bi bi-person-fill"></i> Login <!-- Added login icon -->
            </a>
        </div>
    <?php endif; ?>
</div>

<!-- Row for Username and Logout button -->
<?php if (isset($_SESSION['username'])): ?>
    <div class="d-flex justify-content-end mb-2">
        <div class="text-right">
            <span class="text-white font-weight-bold">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="home.php?logout=true" class="btn btn-danger btn-sm ml-2">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
<?php endif; ?>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Age</th>
            <?php if (isset($_SESSION['username'])): ?> <!-- Check if user is logged in -->
                <th colspan="2">Action</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($connection, $_GET['search']);
            $query = "SELECT * FROM students WHERE first_name LIKE '%$search%' 
                      OR last_name LIKE '%$search%' 
                      OR email LIKE '%$search%' 
                      OR phone LIKE '%$search%' 
                      OR age LIKE '%$search%'";
        } else {
            $query = "SELECT * FROM students";
        }

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['age'] ?></td>
                    <?php if (isset($_SESSION['username'])): ?> <!-- Check if user is logged in -->
                        <td class="action-icon-cell">
                            <a href="update.php?id=<?php echo $row['id']; ?>">
                                <i class="bi bi-pencil-square icon-update" title="Update"></i>
                            </a>
                        </td>
                        <td class="action-icon-cell">
                            <a href="#" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                <i class="bi bi-trash icon-delete" title="Delete"></i>
                            </a>
                        </td>
                    <?php endif; ?>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<script>
    // Function to confirm deletion
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this student?")) {
            window.location.href = "delete.php?id=" + id;
        }
    }

    // Function to display alert message and remove query parameter after
    window.onload = function() {
        const alertMessage = document.getElementById("alertMessage");
        if (alertMessage) {
            alertMessage.style.display = "block";
            setTimeout(function() {
                alertMessage.style.display = "none";

                // Remove the 'delete_success' query parameter from the URL without reloading the page
                const url = new URL(window.location.href);
                url.searchParams.delete('delete_success');
                window.history.replaceState({}, document.title, url);

            }, 2000); // Display for 2 seconds
        }
    }
</script>

<?php include('footer.php'); ?>