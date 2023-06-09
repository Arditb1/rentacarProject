<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DriveNow</title>
  <link rel="shortcut icon" href="pics/logo2.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="index.css" />
  <style>
    body {
      margin: 0;
      overflow-x: hidden;
    }

    .container {
      max-width: 100%;
      padding: 0;
    }

    .container-fluid {
      background-image: url("pics/mercedesi3.png");
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .text-container {
      text-align: center;
      color: white;
      padding: 20px;
    }

    .text-container h3 {
      font-size: 24px;
    }

    .text-container h1 {
      font-size: 32px;
      margin-top: 10px;
    }

    .text-container p {
      font-size: 18px;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-lg-12 col-sm-12 offset-md-3 offset-lg-0 offset-sm-0 text-center position-relative">
        <img src="pics/mercedesi3.png" alt="car pic" class="img-fluid" />
        <div class="position-absolute top-50 start-50 translate-middle text-container">
          <h3 class="text-white">THE ROYAL ESSENCE OF JOURNEY</h3>
          <button type="button" class="btn btn-warning" onclick="redirectToLogin()">Login/Register</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

  <script>
    function redirectToLogin() {
      window.location.href = "testLogin.php";
    }
  </script>
</body>

</html>