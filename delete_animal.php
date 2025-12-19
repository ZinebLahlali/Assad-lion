<?php
  include "./dbconnect.php";

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $delete = "DELETE FROM animaux where id_animal=". $id;
    $run = mysqli_query($conn,$delete);

    header("location: animals.php");
    exit;
  }





?>