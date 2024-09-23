<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true'): ?>
    <div id="alertMessage">
        Student deleted successfully!
    </div>
<?php endif; ?>

<div class="box1 d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
    <h2>ALL STUDENTS</h2>

    <form method="GET" action="home.php" class="d-flex" style="flex-grow: 1; justify-content: center; margin: 0 250px;">
        <input class="form-control" type="search" name="search" placeholder="Search by name, email, or phone" aria-label="Search" style="width: 200px;">
        <button class="btn" type="submit" style="background-color: gray; color: white; border: none;"
            onmouseover="this.style.backgroundColor='green'"
            onmouseout="this.style.backgroundColor='gray'">
            <i class="bi bi-search"></i> Search
        </button>
    </form>


    <form action="add_student.php" method="GET">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-plus"></i> ADD STUDENT
        </button>
    </form>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Age</th>
            <th colspan="2">Action</th>
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