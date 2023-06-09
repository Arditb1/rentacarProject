<?php
include "connect.php";
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="catalog.css">

</head>

<body>
    <h1>Product Catalog</h1>

    <div class="product-container">
        <?php
        // Retrieve the product data from the database
        $sql = "SELECT * FROM cars";
        $result = mysqli_query($conn, $sql);

        // Check if there are any products
        if (mysqli_num_rows($result) > 0) {
            // Iterate over the result set and display the product information
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-card">';
                echo '<h2>' . $row['make'] . ' ' . $row['model'] . '</h2>';
                echo '<p>Year: ' . $row['year'] . '</p>';
                echo '<p>Color: ' . $row['color'] . '</p>';
                echo '<p>Rental Price: $' . $row['rental_price'] . '</p>';

                echo '</div>';
            }
        } else {
            echo '<p>No products found.</p>';
        }


        mysqli_close($conn);
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>