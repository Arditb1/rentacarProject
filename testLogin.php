<?php
include "connect.php";
include "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get email and password from the login form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query the database to check if the user's email and password are correct
  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  // If the user's login credentials are correct
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $user_type = $row['user_type'];

    // Set session variables based on the user's type (1 for admin, 2 for regular user)
    if ($user_type == 1) {
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['user_type'] = 1;
      header("location: admin/admin.php");
      exit();
    } elseif ($user_type == 2) {
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['user_type'] = 2;
      header("location: home.php");
      exit();
    }
  } else {
    echo "Invalid email or password.";
  }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="testLogin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }

    .container {
      width: 400px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .form {
      padding: 30px;
      transition: transform 0.6s ease;
    }

    .form header {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }

    .form form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form form button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      border: none;
      border-radius: 4px;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }

    .signup {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
    }

    .signup label {
      color: #007bff;
      cursor: pointer;
    }

    input[type="checkbox"] {
      display: none;
    }

    .registration.form {
      transform: translateX(400px);
    }

    input[type="checkbox"]:checked~.registration.form {
      transform: translateX(0);
    }
  </style>
</head>

<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form method="post" action="testLogin.php">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <a href="#">Forgot password?</a>
        <button type="submit" name="login">Login</button>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
          <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form method="post" action="register.php">
        <input type="text" placeholder="Enter your First Name" name="first_name">
        <input type="text" placeholder="Enter your Last Name" name="last_name">
        <input type="text" placeholder="Enter your Email" name="email">
        <input type="text" placeholder="Enter your Phone Number" name="phone_number">
        <input type="password" placeholder="Create a Password" name="password">
        <input type="password" placeholder="Confirm your Password" name="confirm_password">
        <input type="submit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
          <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>