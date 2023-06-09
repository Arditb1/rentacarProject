<!-- admin.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Admins</title>
    <link rel="stylesheet" type="text/css" href="admin-layout.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include "../checkSession.php"; ?>
    <div class="admin-panel">
        <div class="sidebar">
            <h1>Admin Panel</h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="cars.php">Cars</a></li>
                <li><a href="bookings.php">Bookings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <header>
                <h2>Admins</h2>
            </header>

            <div class="main">
                <a href="add_user.php" class="add-button">Add User</a>

                <div class="admin-container">
                    <?php
                    // Retrieve the admin data from the database
                    include "../connect.php";
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($admin = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="admin">
                                <div class="details">
                                    <p><strong>Name:</strong>
                                        <?php echo $admin['first_name'] . ' ' . $admin['last_name']; ?>
                                    </p>
                                    <p><strong>Email:</strong>
                                        <?php echo $admin['email']; ?>
                                    </p>
                                    <div class="actions">
                                        <a href="edit_user.php?user_id=<?php echo $admin['user_id']; ?>"
                                            class="edit-button">Edit</a>


                                        <a href="delete_users.php?user_id=<?php echo $admin['user_id']; ?>"
                                            class="delete-button">Delete</a>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p>No admins found.</p>';
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>