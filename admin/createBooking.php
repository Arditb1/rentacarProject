<?php
include "../connect.php";
include "../checkSession.php";

// Assuming you have a database connection established

// Retrieve the car types from the database
$carTypesQuery = "SELECT DISTINCT model FROM cars";
$carTypesResult = mysqli_query($conn, $carTypesQuery);

// Check if there are any car types
if (mysqli_num_rows($carTypesResult) > 0) {
    // Store the car types in an array
    $carTypes = array();
    while ($row = mysqli_fetch_assoc($carTypesResult)) {
        $carTypes[] = $row['model'];
    }
} else {
    // Handle the case when no car types are found
    // Redirect to an error page or perform any other necessary actions
    header("Location: bookings.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data and perform necessary validation

    // Retrieve the form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $carType = $_POST['carType'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Insert the booking details into the bookings table
    $insertBookingQuery = "INSERT INTO bookings (first_name, last_name, email, phone_number, whichcar, start_date, end_date) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$carType', '$startDate', '$endDate')";
    mysqli_query($conn, $insertBookingQuery);

    // Redirect to a success page or perform any other necessary actions
    header("Location: bookings.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Create Booking</title>
    <link rel="stylesheet" type="text/css" href="admin-layout.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        /* Add your custom styles for the create booking form here */
        .form-container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="tel"],
        .form-container input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .form-container .button-container {
            text-align: right;
        }

        .form-container button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
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
                <h2>Create Booking</h2>
                <div class="form-container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label for="firstName">First Name:</label>
                        <input type="text" name="firstName" required>
                        <label for="lastName">Last Name:</label>
                        <input type="text" name="lastName" required>
                        <label for="email">Email:</label>
                        <input type="email" name="email" required>
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" name="phoneNumber" required>
                        <label for="carType">Car Type:</label>
                        <select name="carType" required>
                            <?php
                            // Iterate over the car types and generate the dropdown options
                            foreach ($carTypes as $carType) {
                                echo '<option value="' . $carType . '">' . $carType . '</option>';
                            }
                            ?>
                        </select>
                        <label for="startDate">Start Date:</label>
                        <input type="date" name="startDate" required>
                        <label for="endDate">End Date:</label>
                        <input type="date" name="endDate" required>
                        <div class="button-container">
                            <button type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>