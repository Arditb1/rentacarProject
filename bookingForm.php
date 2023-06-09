<?php
include "connect.php";

// Assuming you have a database connection established

// Retrieve the list of car types (distinct "make" values) from the "cars" table
$carTypesQuery = "SELECT DISTINCT make, model, rental_price, year, color, id FROM cars";
$carTypesResult = mysqli_query($conn, $carTypesQuery);
$carTypes = mysqli_fetch_all($carTypesResult, MYSQLI_ASSOC);

// Insert booking into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $firstName = isset($_POST['name']) ? $_POST['name'] : '';
    $lastName = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
    $carType = isset($_POST['carType']) ? $_POST['carType'] : '';
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Get the selected car make, model, and ID from the carType value
    $carMake = '';
    $carModel = '';
    $carId = null;
    if ($carType) {
        list($carMake, $carModel, $carId) = explode('-', $carType);
        $carMake = trim($carMake);
        $carModel = trim($carModel);
        $carId = trim($carId);
    }

    // Insert the booking details into the bookings table
    $insertBookingQuery = "INSERT INTO bookings (customer_id, first_name, last_name, email, phone_number, whichcar, car_id, start_date, end_date)
                           VALUES ('$userId', '$firstName', '$lastName', '$email', '$phoneNumber', '$carType', '$carId', '$startDate', '$endDate')";
    mysqli_query($conn, $insertBookingQuery);

    // Redirect to a success page or perform any other necessary actions
    header("Location: home.php");
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Booking Form</title>
    <link rel="stylesheet" type="text/css" href="bookingForm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php include "checkSession.php";
    ?>
    <div class="container">
        <h2>Booking Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" required>
            </div>
            <div class="form-group">
                <label for="carType">Car Model</label>
                <select id="carType" name="carType" required>
                    <?php foreach ($carTypes as $car): ?>
                        <option value="<?php echo $car['make'] . ' - ' . $car['model'] . ' - ' . $car['id']; ?>">
                            <?php echo $car['make']; ?> - <?php echo $car['model']; ?> - €<?php echo $car['rental_price']; ?> - <?php echo $car['year']; ?> - <b>
                                <?php echo $car['color']; ?>
                            </b>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDate" name="startDate" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date</label>
                <input type="date" id="endDate" name="endDate" required>
            </div>
            <div class="button-container">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>