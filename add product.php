<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{% static 'images/icon.png' %}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/Online-shop-logo-template-on-transparent-background-PNG.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <style>

            .fs-1{
                font-size: 60px;
                color: black;
                font-family:Georgia, 'Times New Roman', Times, serif;
            }
            .btn1{
                margin-top: 50px;
                width: 100%;
                border-radius: 25rem;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 30;
            }
            .navbar-brand{
                color: #ea6566 !important;
            }
            #f1{
                text-align: center;
            }
            .container{
                margin:auto;
            }


    
  </style>
    <title>
            add product
    </title>
</head>

<body>

<?php
      $rs="";
      $conn = mysqli_connect('localhost','root','','ecommerce');

      function test_input($data) {
        $data = htmlspecialchars($data);
        return $data;
      }
    session_start();
    if(!isset($_SESSION["username"]))
      header("location:login.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if(isset($_GET['submit']))
      {
        session_unset(); 
        session_destroy();
        header("location:login.php");
      }}
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['submit']))
        {
          $name = trim(test_input($_POST['name']));
          $type = trim(test_input($_POST['type']));
          $price = trim(test_input($_POST['price']));
          $description = trim(test_input($_POST['description']));
          $sql = "insert into product (name,price,type,description) values ('".$name."','".$price."','".$type."','".$description."')";
          $rs = mysqli_query($conn, $sql);


      }
      }
  ?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" > <?php
                                    echo($_SESSION["username"]);
                                  ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link"href="home admin.php" aria-current="page">All product</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="add product.php">Add product</a>
            </li>

          </ul>
          <form method="get" class="form-inline my-2 my-lg-0">
            <!-- <div style="margin-right:20px">
          <button type="submit" class="btn btn-danger my-2 my-sm-0">Logout</button></div> -->
            <button name="submit" class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
          </form>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>  -->
        </div>
      </nav>
      
        <main class="container" style="margin-top:50px">
        <form method="post">
          
        <div class="contant justify-content-md-center  clo-5">
          <?php
            if ($rs==1)
              echo('<div class="row justify-content-md-center">
              <div class="col-4">
              <div class="mb-3">
              <div class="alert alert-success" role="alert">
                successful
              </div></div></div></div>');
            else if($rs===0){
                echo("failed to add product");
              }
          ?>
        
        <div class="row justify-content-md-center">
        <div class="col-4">
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Product Name</label>
          <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="product name">
        </div></div></div>
        <div class="row justify-content-md-center">
        <div class="col-4">
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Type</label>
          <input type="text" name="type" class="form-control" id="formGroupExampleInput2" placeholder="product type">
        </div></div></div>
        <div class="row justify-content-md-center">
        <div class="col-4">
        <div class="form-group">
  <label for="exampleFormControlTextarea1">description</label>
  <textarea class="form-control rounded-0" name="description" id="exampleFormControlTextarea1" rows="5 "></textarea>
</div></div></div>
<div class="row justify-content-md-center">
        <div class="col-4">
          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input name="price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">price</span>
          </div></div></div>
          <div class="row justify-content-md-center">
        <div class="col-4">
          <button type="submit" name="submit" class="btn btn-outline-warning btn-block">Save</button>
        </div></div>
        </div></form>
        </main>
        <footer class="bg-light text-center text-lg-start fixed-bottom">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-dark">Ahmad allahham</a>
            </div>
            <!-- Copyright -->
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
      </body>

</html>
