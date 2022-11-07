<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/Online-shop-logo-template-on-transparent-background-PNG.png">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
  <?php
$username = "root";
$password = "";
$pdo = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8;", $username, $password);

  function test_input($data) {
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $username = test_input($_POST['username']);
    $_SESSION["username"] = $username;
    $password = test_input($_POST['password']);
    
    $stmt1 = $pdo->query("SELECT * FROM user");
    $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $exest = false;

    foreach ($rows as $row) {
      if ($row['password'] == $password && $row['username'] == $username)
      {
        $exest = true;

        if ($row['superuser'] == 0)
          header("Location: home user.php");

        if($row['superuser'] == 1)
          header("location: home admin.php");

      }
    }

      if (!$exest)
          echo('<div class="alert alert-danger" role="alert">
                check your username or password
                </div>');
  }
  ?>


  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Login</h3>
              <p class="mb-4">Please inter valid username and password if you are not member please sign up</p>
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input name = "username" type="text" class="form-control" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input name = "password" type="password" class="form-control" id="password">

              </div>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="signup.php" class="forgot-pass">Sign up</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">
            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>