<?php
  include "./dbconnect.php";

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $delete = "DELETE FROM habitats where id_habitat=". $id;
    $run = mysqli_query($conn,$delete);

    header("location: habitats.php");
    exit;
  }





?>