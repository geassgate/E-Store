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

    <title>Sign up </title>
  </head>
  <body>
    <?php
      $rs="";
      $conn = mysqli_connect('localhost','root','','ecommerce');

      function test_input($data) {
        $data = htmlspecialchars($data);
        return $data;
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['submit']))
        {
          $full_name = test_input($_POST['fullname']);
          $username = test_input($_POST['username']);
          $password = test_input($_POST['password']);
          $username = trim($username);
          $sql = "insert into user (name,password,username) values ('".$full_name."','".$password."','".$username."')";
          $rs = mysqli_query($conn, $sql);
      }
      }
    ?>
    <script>
      function rex(x){
        full_name = document.getElementById('fullname')
        username = document.getElementById('email')
        password = document.getElementById('password')
        re_password = document.getElementById('re-password')
        username_validation = username.value.search(/\S[a-z]+\S[0-9]*\S/)
        password_validation = password.value.search(/\S/)
        valedation = document.getElementById('validation')
        switch (x) {
          case 1:
            if (username_validation < 0){
              valedation.innerHTML = "invaled uername"
              valedation.style.color = 'red'
              username.focus()
              username.select()
            }
            else
              valedation.innerHTML = ""

            break;
          case 2:
            if (password_validation < 0){
            valedation.innerHTML = "invaled password"
            valedation.style.color = 'red'
            password.focus()
            password.select()
            }
            else
              valedation.innerHTML = ""
            break;
        case 3:
            if (re_password.value != password.value){
              valedation.innerHTML = "the password don't match"
              valedation.style.color = 'red'
              re_password.select()
            }
            else 
            valedation.innerHTML = ""
            break;
        }
        
      }
    </script>
  

  
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
              <h3>Sign Up</h3>
              <p id="validation" style="color: green;" class="mb-4"><?php 
                                                if ($rs == 1 )
                                                  echo("Success")  
                                                ?>
                                              </p>
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="fullname">Full name</label>
                <input name= "fullname" type="text" class="form-control" id="fullname" >

              </div>
              <div class="form-group">
                <label for="email">Username</label>
                <input name= "username" type="text" class="form-control" id="email" onblur="rex(1);" >

              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input name= "password" type="password" class="form-control" onblur="rex(2);" id="password" >
                
              </div>
              <div class="form-group last mb-4">
                <label for="re-password">Re-type Password</label>
                <input type="password" class="form-control" onblur="rex(3);" id="re-password" >
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>

              
              <input name="submit" type="submit" value="Register" class="btn btn-block btn-primary">
              <button  class="btn btn-block btn-success"><a style="color: white;text-decoration: none;" href="login.php">Login</a></button>
            </div>
              
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