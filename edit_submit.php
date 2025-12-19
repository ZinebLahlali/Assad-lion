<?php 

include "./dbconnect.php";
// if($_SERVER["REQUEST_METHOD"] === "POST"){
      $id = $_POST['id_animal'];
      $nom = $_POST['name_edit'];
      $espece = $_POST['species_edit'];
      $alimentation = $_POST['type_alimentaire_edit'];
      $image = $_POST['image_edit'];
      $paysorigine = $_POST['country_edit'];
    //   Id_habitat_edit
      $id_habitatedit = $_POST['Id_habitat_edit'];
      $descriptioncourte = $_POST['description_edit'];
    //   echo $id, $nom, $espece, $alimentation , $image , $paysorigine , $descriptioncourte ;

      $sql ="UPDATE animaux 
      SET nom = ?, `espèce` = ?, alimentation = ?,image = ?,paysorigine = ?,descriptioncourte = ? WHERE id_animal = ?";
      

        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "ssssssi", $nom, $espece, $alimentation, $image, $paysorigine, $descriptioncourte, $id);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        header("Location: animals.php? success=1");
    
// }

?>