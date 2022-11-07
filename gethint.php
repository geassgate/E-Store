<?php

// get the query_result parameter from URL
$query_result = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $query_result is different from ""
if ($query_result !== "") {
  $query_result = strtolower($query_result);
  $len=strlen($query_result);
  $con = mysqli_connect ('localhost','root','','ecommerce');
  mysqli_select_db($con,"ajax_demo");
  $SearchLetter = substr($query_result, 0, $len).'%';
  $sql="SELECT p.name FROM product as p WHERE p.name like '".$SearchLetter."'";
  $result = mysqli_query($con,$sql);

  foreach($result as $row) {
    $name = $row['name'];
      if ($hint == "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint == "" ? "" : $hint;
?>