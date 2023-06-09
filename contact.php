<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact us</title>
  <link rel="shortcut icon" href="pics/logo2.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .contact img {
      max-width: 100%;
      height: auto;
    }

    .office,
    .airport {
      font-size: 30px;
      font-weight: bold;
      margin-top: 40px;
      text-align: center;
    }

    .rruga,
    .qyteti,
    .kosovo,
    .qyteti2,
    .nr1,
    .nr2,
    .email1,
    .email2 {
      margin-top: 10px;
      font-size: 18px;
      text-align: center;
    }

    .contactus {
      font-size: 30px;
      margin-top: 60px;
      text-align: center;
    }

    form {
      max-width: 400px;
      margin-top: 20px;
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      font-weight: bold;
      color: #000000;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      padding: 20px;
      margin-bottom: 20px;
      width: 100%;
      border: none;
      border-radius: 3px;
      background-color: #f7f7f7;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }

    textarea {
      resize: vertical;
      height: 100px;
    }

    .btn-primary {
      display: block;
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 3px;
      background-color: #000000;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <?php include "checkSession.php" ?>
  <?php include "header.php"
    ?>
  <div class="container">
    <img src="pics/contact2.png" alt="contact" />

    <h1 class="office">Our Office</h1>
    <p class="drive">DriveNow Rent a Car</p>
    <p class="rruga">Rruga e Shkronjave, Prizren.</p>
    <p class="qyteti">Nr.1, 12000, Prizren, Republic of Kosovo</p>
    <p class="airport">Prishtina International Airport</p>
    <p class="kosovo">Kosovo International Airport</p>
    <p class="qyteti2">1000, Sllatine, Republic of Kosovo</p>
    <p class="nr1">+383 49 112 211</p>
    <p class="nr2">+383 44 112 211</p>
    <p class="email1">info@DriveNow.com</p>
    <p class="email2">DriveNow@gmail.com</p>
    <h3 class="contactus">Contact Us</h3>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <div class="form-group">
        <label class="label" for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required />
      </div>

      <div class="form-group">
        <label class="label" for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required />
      </div>

      <div class="form-group">
        <label class="label" for="message">Message</label>
        <textarea id="message" name="message" class="form-control" placeholder="Enter your message" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Send</button>
    </form>
  </div>

  <?php include "footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>