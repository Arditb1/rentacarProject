<?php
session_start();
include "connect.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DriveNow</title>
  <link rel="shortcut icon" href="pics/logo2.png">
  <link rel="stylesheet" type="text/css" href="home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 50px;
    }

    .block {
      width: 100%;
      max-width: 500px;
      margin: 20px;
      padding: 10px;
      background-color: #f7f7f7;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
      border-radius: 5px;
      text-align: center;
      height: 400px;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }


    .block {
      width: 100%;
      max-width: 500px;
      margin: 20px;
      padding: 10px;
      background-color: #f7f7f7;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
      border-radius: 5px;
      text-align: center;
      height: 400px;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    .car-details {
      flex-grow: 0;
      padding-bottom: 20px;
    }

    .cmimi1 {
      font-family: "champ", sans-serif;
      font-size: 24px;
      margin-top: 10px;
    }

    .day1 {
      font-family: "champ", sans-serif;
      font-size: 18px;
      margin-top: -10px;
    }

    .kerri1 {
      font-family: "noir", sans-serif;
      font-size: 20px;
      margin-top: 20px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 100%;
    }

    .btn3 {
      position: absolute;
      bottom: 20px;
      right: 20px;
      margin-top: auto;
    }

    .btn3 button {
      font-family: "bold", sans-serif;
      font-weight: 0;
      font-size: 16px;
      color: #fff;
      background-color: #ff8000;
      padding: 10px 20px;
      border: none;
      box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 6px 0px;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn3 button:hover {
      background-color: #ff6600;
    }

    .book-now-btn {
      font-family: "bold", sans-serif;
      font-weight: 0;
      font-size: 16px;
      color: #fff;
      background-color: #ff8000;
      padding: 10px 20px;
      border: none;
      box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 6px 0px;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }

    .book-now-btn:hover {
      background-color: #ff6600;
    }

    .custom-section {
      padding: 50px 20px;
      background-color: #f7f7f7;
      text-align: center;
    }

    .custom-section .kerri {
      margin-bottom: 20px;
    }

    .custom-section .kerri img {
      width: 100%;
      max-width: 400px;
      height: auto;
      border-radius: 10px;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
    }

    .custom-section .teksti img {
      width: 100%;
      max-width: 250px;
      height: auto;
      border-radius: 5px;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>

<body>


  <div class="container">
    <?php
    include "checkSession.php";
    // Retrieve car data from the database
    $sql = "SELECT * FROM cars";
    $result = mysqli_query($conn, $sql);

    // Check if there are any cars in the database
    if (mysqli_num_rows($result) > 0) {
      // Loop through each car and display its details
      while ($car = mysqli_fetch_assoc($result)) {
        $carImage = $car['image'];
        $carMake = $car['make'];
        $carModel = $car['model'];
        $carRentalPrice = $car['rental_price'];
        ?>

        <div class="block">
          <img src="car_images/<?php echo $carImage; ?>" alt="<?php echo $carMake . ' ' . $carModel; ?>">

          <div class="car-details">
            <div class="kerri1">
              <p>
                <?php echo $carMake . ' ' . $carModel; ?>
              </p>
            </div>
            <div class="cmimi1">
              <p>
                <?php echo $carRentalPrice; ?> €
              </p>
            </div>

            <div class="btn3">
              <a href="bookingForm.php?car_make=<?php echo urlencode($carMake); ?>&car_model=<?php echo urlencode($carModel); ?>"
                class="book-now-btn">BOOK NOW</a>
            </div>
          </div>
        </div>
        <?php
      }
    } else {
      echo '<p>No cars available.</p>';
    }

    mysqli_close($conn);
    ?>
  </div>

  <?php include "footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>