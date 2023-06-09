<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Bookings</title>
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
                <h2>Manage Bookings</h2>
                <!-- Add inline styles to the "Create Booking" button in bookings.php -->

                <div class="create-booking-button">
                    <a href="createBooking.php" class="create-button"
                        style="display: inline-block; background-color: #4CAF50; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 4px; transition: background-color 0.3s ease;">Create
                        Booking</a>
                </div>

                <div class="product-container">
                    <?php
                    // Retrieve the booking data from the database
                    include "../connect.php";

                    $bookingsQuery = "SELECT * FROM bookings";
                    $bookingsResult = mysqli_query($conn, $bookingsQuery);

                    // Check if there are any bookings
                    if (mysqli_num_rows($bookingsResult) > 0) {
                        // Iterate over the result set and display the booking information
                        while ($booking = mysqli_fetch_assoc($bookingsResult)) {
                            echo '<div class="product-card">';
                            echo '<h3>Booking ID: ' . $booking['booking_id'] . '</h3>';
                            echo '<p><strong>Customer Name:</strong> ' . $booking['first_name'] . ' ' . $booking['last_name'] . '</p>';
                            echo '<p><strong>Email:</strong> ' . $booking['email'] . '</p>';
                            echo '<p><strong>Phone Number:</strong> ' . $booking['phone_number'] . '</p>';
                            echo '<p><strong>Car Type:</strong> ' . $booking['whichcar'] . '</p>';
                            echo '<p><strong>Start Date:</strong> ' . $booking['start_date'] . '</p>';
                            echo '<p><strong>End Date:</strong> ' . $booking['end_date'] . '</p>';
                            echo '<a href="updateBooking.php?bookingId=' . $booking['booking_id'] . '" class="edit-button">Update</a>'; // Updated with class name
                            echo '<a href="deleteBooking.php?bookingId=' . $booking['booking_id'] . '" class="delete-button">Delete</a>'; // Updated with class name
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No bookings found.</p>';
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