<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Cars</title>
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
                <h2>Welcome, Admin!</h2>
            </header>

            <div class="main">
                <!-- Main content of the admin panel goes here -->
                <h2>Cars Catalog</h2>

                <div class="product-container">
                    <?php
                    // Retrieve the car data from the database
                    include "../connect.php";

                    $sql = "SELECT * FROM cars";
                    $result = mysqli_query($conn, $sql);

                    // Check if there are any cars
                    if (mysqli_num_rows($result) > 0) {
                        // Iterate over the result set and display the car information
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<h3>' . $row['make'] . ' ' . $row['model'] . '</h3>';
                            echo '<p>Year: ' . $row['year'] . '</p>';
                            echo '<p>Color: ' . $row['color'] . '</p>';
                            echo '<p>Rental Price: $' . $row['rental_price'] . '</p>';
                            echo '<a href="edit_car.php?car_id=' . $row['id'] . '" class="edit-button">Edit</a>'; // Updated with class name
                            echo '<a href="delete_car.php?car_id=' . $row['id'] . '" class="delete-button">Delete</a>'; // Updated with class name
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No cars found.</p>';
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </div>

                <!-- Form for adding a new car -->
                <h2>Add New Car</h2>
                <form action="add_car.php" method="POST">
                    <label for="make">Make:</label>
                    <input type="text" id="make" name="make" required>

                    <label for="model">Model:</label>
                    <input type="text" id="model" name="model" required>

                    <label for="year">Year:</label>
                    <input type="text" id="year" name="year" required>

                    <label for="color">Color:</label>
                    <input type="text" id="color" name="color" required>

                    <label for="rental_price">Rental Price:</label>
                    <input type="number" id="rental_price" name="rental_price" required>

                    <button type="submit">Add Car</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>