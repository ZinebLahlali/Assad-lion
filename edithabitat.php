<?php 
include "./dbconnect.php";

if(isset($_GET['id'])){
    $modif = $_GET['id'];
  $sql = "SELECT * FROM habitats WHERE id_habitat= ".$modif;

  $run = mysqli_query($conn,$sql);
  $result = mysqli_fetch_assoc($run);

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Zoo Manager Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex h-screen" >

<div id="habitatPopup" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-full max-w-md shadow-xl">

        <form action="habitat.php" method="POST" action="edithabitat.php" class="flex flex-col gap-3">
        <input name="id_habitat" type="text" class="hidden" value="<?= $result["id_habitat"] ?>">

            <input value="<?= $result["nom"] ?>" type="text" name="editnom" placeholder="Nom" 
                value=""
                class="border rounded px-3 py-2" />

            <input  value="<?= $result["typeclimat"] ?>" type="text" name="edittypeClimat" placeholder="Type de climat" 
                value="" 
                class="border rounded px-3 py-2" />

            <textarea name="editdescription" placeholder="Description" 
                class="border rounded px-3 py-2"><?= $result["description"] ?></textarea>

            <input value="<?= $result["zonezoo"] ?>" type="text" name="editzoneZoo" placeholder="Zone du zoo" 
                value="" 
                class="border rounded px-3 py-2" />
            <input value="<?= $result["image"] ?>" type="url" name="editimage" placeholder="Image URL"
             class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">    

            <div class="flex gap-4 mt-3">
                <input type="submit" name="submit" value="Submit"
                    class="bg-green-500 text-white px-4 py-2 rounded cursor-pointer w-full" />

                <button type="button" id="habitatCancel" 
                    class="bg-orange-400 text-white px-4 py-2 rounded w-full">
                    Cancel
                </button>
            </div>

        </form>
    </div>
</div>
</body>
</html>