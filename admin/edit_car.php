<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Car - Admin Panel</title>
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
                <li><a href="cars.php">Cars</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <header>
                <h2>Edit Car</h2>
            </header>

            <div class="main">
                <?php
                // Check if car ID is provided in the query string
                if (isset($_GET['car_id'])) {
                    $carId = $_GET['car_id'];

                    // Retrieve the car data from the database based on car ID
                    include "../connect.php";
                    $sql = "SELECT * FROM cars WHERE id = $carId";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $car = mysqli_fetch_assoc($result);
                        ?>
                        <form action="update_car.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">
                            <label for="make">Make:</label>
                            <input type="text" name="make" id="make" value="<?php echo $car['make']; ?>"><br><br>
                            <label for="model">Model:</label>
                            <input type="text" name="model" id="model" value="<?php echo $car['model']; ?>"><br><br>
                            <label for="year">Year:</label>
                            <input type="number" name="year" id="year" value="<?php echo $car['year']; ?>"><br><br>
                            <label for="color">Color:</label>
                            <input type="text" name="color" id="color" value="<?php echo $car['color']; ?>"><br><br>
                            <label for="rental_price">Rental Price:</label>
                            <input type="number" name="rental_price" id="rental_price"
                                value="<?php echo $car['rental_price']; ?>"><br><br>
                            <label for="image">Car Image:</label>
                            <?php if (!empty($car['image_path'])): ?>
                                <img src="../car_images/Car Pictures/<?php echo $car['image_path']; ?>" alt="Car Image"><br><br>
                                <input type="checkbox" name="remove_image" id="remove_image">
                                <label for="remove_image">Remove Picture</label><br><br>
                            <?php else: ?>
                                <p>No image available.</p>
                            <?php endif; ?>

                            <input type="file" name="image" id="image"><br><br>
                            <input type="submit" value="Update">
                        </form>
                        <?php
                    } else {
                        echo '<p>Car not found.</p>';
                    }

                    // Close the database connection
                    mysqli_close($conn);
                } else {
                    echo '<p>Invalid car ID.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>