<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/Online-shop-logo-template-on-transparent-background-PNG.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    
    <style>
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

        

    
  </style>
    <title>
            pag
    </title>
</head>

<body>

<script>
function showHint(str) {
  if (str.length == 0)
    document.getElementById("text").innerHTML = "";
  else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "gethint.php?q="+str, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
        document.getElementById("text").innerHTML = this.responseText
    }
    }
    }
</script>

  <?php
    //start session
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //end of session logout
      if(isset($_GET['logout']))
      {
        session_unset(); 
        session_destroy();
        header("location:login.php");
      }
      //delete product fromo pag
      else if(isset($_GET['delete']) && isset($_GET['product_id'])){
        $username = "root";
        $password = "";
        $pdo = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8;", $username, $password);
        //get the user id 
        $name = $_SESSION["username"];
        $sql1 = "SELECT id FROM user as u  WHERE u.username='".$name."'";
        $pdo = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8;", $username, $password);
        $stmt1 = $pdo->query($sql1);
        $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $user_id = $rows[0]["id"];

        //SQL-------
        $sql="DELETE FROM bag WHERE product_id = :zip AND user_id =". $user_id ."";
        // echo($user_id .array(':zip' => $_GET['product_id']));
        $stmt = $pdo->prepare($sql); 
        $stmt->execute(array(':zip' => $_GET['product_id'])); 
      }
    }
  ?>

    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" style="color:red" > <?php
                                    echo($_SESSION["username"]);
                                  ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link"href="home user.php" aria-current="page">All product</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="bag.php">My bag</a>
            </li>
          </ul>
          <form method="get" class="form-inline my-2 my-lg-0">
            <button name="logout" class="form-control mr-sm-2 btn btn-danger my-2 my-sm-0" >Logout</button>
            <input id="search" class="form-control mr-sm-2"  placeholder="search" aria-label="Search" onkeyup="showHint(this.value);">
          </form>
          <form method="post" class="form-inline my-2 my-lg-0">
            <button name="submit" class="form-control mr-sm-2 btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <?php
    $username = "root";
    $password = "";
    $pdo = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8;", $username, $password);
    //get the user id 
    $sql = "SELECT id FROM user as u  WHERE u.username='".$_SESSION["username"]."'";
    $stmt = $pdo->query($sql);
    $rows2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $user_id = $rows2[0]["id"];
    //get the user product_id 
    
    $stmt1 = $pdo->query("SELECT * FROM bag 
                        INNER JOIN user ON bag.user_id = user.id 
                        INNER JOIN product ON bag.product_id = product.id 
                        WHERE user.id = '".$user_id."'");
    $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    //get the user product
    // $stmt2 = $pdo->query("SELECT product_id FROM bag as b WHERE b.user_id = '".$user_id."'");
    // $product_id_rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {

?>

<div class="py-5">
        <div class="container">
          <div class="row hidden-md-up">
            <div class="col-md-4">
                <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                <h5  class="card-title "><?php echo($row["name"])?><span style="margin-left:10px;" class="badge badge-warning"><?php echo($row["type"])?></span></h5>
                
                <p class="card-text"><?php echo($row["description"])?></p>
                <form method="get" class="form-inline my-2 my-lg-0">
                <input type="hidden" name="product_id" value="<?php echo($row["id"]); ?>">
                <button name="delete" class="btn btn-primary" type="submit">Delete</button><span style="margin-left: 20px;font-size: 17px;font-weight: bold;" > Price: <?php echo($row["price"]) ?> $</span>
                </form>
                </div>
    
            </div>
            </div>
          </div>
        </div>
      </div>

<?php
}
?>
    
        <footer class="bg-light text-center text-lg-start fixed-bottom">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-dark">Ahmad Allahham</a>
            </div>
            <!-- Copyright -->
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
      </body>

</html>
