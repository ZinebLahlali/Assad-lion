<?php 
include "./dbconnect.php";
if(isset($_GET['id'])){
    $edit = $_GET['id'];
  $sql = "SELECT * FROM animaux WHERE id_animal= ".$edit;

//   "SELECT * FROM animaux WHERE id_animal = "
  $run = mysqli_query($conn,$sql);
  $result = mysqli_fetch_assoc($run);

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Virtual Zoo – Login / Signup</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-white text-white">
<div>
    <form id="editForm" method="POST" class="grid gap-3" action="edit_submit.php">
        <input name="id_animal" type="text" class="hidden" value="<?= $result["id_animal"] ?>">
      <input value="<?= $result["nom"] ?>" type="text" name="name_edit" placeholder="Nom"
             class="border text-black rounded-lg px-3 py-2 text-black focus:ring-2 focus:ring-green-500 outline-none">

      <input  value="<?= $result["espèce"] ?>" type="text" name="species_edit" placeholder="Espèce"
             class="border  text-black rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">

      <input value="<?= $result["image"] ?>" type="url" name="image_edit" placeholder="Image URL"
             class="border text-black rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">

       <select name="type_alimentaire_edit" class="border text-black p-1 w-full mb-2" required>
                    <option value="Carnivore" <?= ($result["alimentation"]=='Carnivore')? 'selected':'' ?>>Carnivore</option>
                    <option value="Herbivore" <?= ($result["alimentation"]=='Herbivore')? 'selected':'' ?>>Herbivore</option>
                    <option value="Omnivore" <?= ($result["alimentation"]=='Omnivore')? 'selected':'' ?>>Omnivore</option>
                   
                </select>
      <input  value="<?= $result["paysorigine"] ?>" type="text" name="country_edit" placeholder="Pays d'origine"
             class=" text-black border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">

       <select name="Id_habitat_edit" class="border  text-black p-1 w-full mb-2" required>
                    <option value=""  disabled>Select habitat</option>
                    <?php
                    $i = 1;
                    $habitats = mysqli_query($conn, "SELECT id_habitat, nom FROM habitats");
                    while ($row = mysqli_fetch_assoc($habitats)) {
                        
                    
                        if($row["id_habitat"] == $result["id_habitat"]){
                            echo '<option selected value="' . $row['id_habitat'] . '" >' . $row['nom'] . '</option>';
                        }
                        else{
                             echo '<option value="' . $row['id_habitat'] . '">' . $row['nom'] . '</option>';

                        }

                        $i++;
                    }
                    ?>
                </select>

      <textarea name="description_edit" rows="3" placeholder="Description courte"
                class="border text-black rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none"><?= $result["descriptioncourte"] ?></textarea>

    
      <div class="flex gap-3 mt-4">
        <button type="submit"
                class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
          Enregistrer
        </button>

        <button type="button" class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition">
          Annuler
        </button>
      </div>

    </form>
  </div>
</body>
</html>