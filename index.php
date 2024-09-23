<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2>ALL STUDENTS</h2>
    <form action="add_student.php" method="GET">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-plus"></i> ADD STUDENT
        </button>
    </form>
</div>

<table class="table table-hover table-bordered  table-striped">
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
        $query = "select * from students";
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
                        <a href="#">
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

<?php include('footer.php'); ?>