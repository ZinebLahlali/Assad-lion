<?php 
   include "./dbconnect.php";
  $nom = "";
   $typeclimat = "";
   $description = "";
   $zonezoo = "";
   $image = "";
   if(isset($_POST['submit'])) {
     $sql = "INSERT INTO animaux (nom, typeclimat, , image, description,zonezoo)
      VALUES ('$nom','$typeclimat','$image','$description','$zonezoo')";
      if(mysqli_query($conn, $sql)){
        header("Location: habitats.php? success=1");
        exit;
      } else {
        echo "Error:" . mysqli_error($conn);
      }
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

  <!-- Sidebar -->
  <div class="w-64 bg-gray-800 flex flex-col p-4">
    <h1 class="text-xl font-bold mb-6"> ASSAD ZOO</h1>
    <nav class="flex flex-col gap-4">
     <a href="/Assad-lion/home.php"> <button class="nav-btn hover:bg-green-700 px-4 py-2 rounded" >Dashboard</button></a>
     <a href="/Assad-lion/users.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >utilisateurs</button> </a>
     <a href="/Assad-lion/animals.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >Animals</button> </a>
     <a href=""> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >Habitats</button> </a>
     <a href="/Assad-lion/statistiques.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >Statistiques</button> </a>
     <a href="#"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >Déconnexion</button> </a>
    </nav>
  </div>
  <div class="flex-1 p-6">

<div class="flex-1 p-6 flex justify-end">

  <button id="addHabitatBtn"
    onclick="openModal()"
    class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
    + Ajouter un habitat
  </button>

</div>


<div id="habitatPopup" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-full max-w-md shadow-xl">

        <form action="habitat.php" method="POST" class="flex flex-col gap-3">

            <input type="text" name="nom" placeholder="Nom" 
                value=""
                class="border rounded px-3 py-2" />

            <input type="text" name="typeClimat" placeholder="Type de climat" 
                value="" 
                class="border rounded px-3 py-2" />

            <textarea name="description" placeholder="Description" 
                class="border rounded px-3 py-2"></textarea>

            <input type="text" name="zoneZoo" placeholder="Zone du zoo" 
                value="" 
                class="border rounded px-3 py-2" />

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
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
<?php
$sql = "SELECT * FROM habitats";
$result = mysqli_query($conn, $sql);
if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">';
        echo '<img src="' . $row['image'] . '" class="w-full h-48 object-cover">';
        echo '<div class="p-4">';
        echo '<h3 class="text-lg font-bold text-gray-800 mb-2">' . $row['nom'] . '</h3>';
        echo '<p class="text-gray-600"><span class="font-semibold">Type de climat:</span> ' . $row['typeclimat'] . '</p>';
        echo '<p class="text-gray-600"><span class="font-semibold">Description:</span> ' . $row['description'] . '</p>';
        echo '<p class="text-gray-600"><span class="font-semibold">Zone:</span> ' . $row['zonezoo'] . '</p>';
        echo '<div class="flex gap-2">';
        echo '<a href="edit_animal.php?id=15" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-lg transition">Edit</a>';
        echo '<a href="delete_animal.php?id=14" class="flex-1 bg-red-500 hover:bg-red-600 text-white text-center py-2 rounded-lg transition" onclick="return confirm(\'Are you sure you want to delete this animal?\')">Delete</a>';
        echo '</div>';

        echo '</div>'; 
        echo '</div>'; 
    }
} else {
    echo '<p class="col-span-3 text-center text-gray-400">No animals found.</p>';
}
?>
</div>


<script>
    const addBtn = document.getElementById('addHabitatBtn');
    const popup = document.getElementById('habitatPopup');
    const cancelBtn = document.getElementById('habitatCancel');


    addBtn.addEventListener('click', () => {
        popup.classList.remove('hidden');
    });

 
    cancelBtn.addEventListener('click', () => {
        popup.classList.add('hidden');
    });

   
    popup.addEventListener('click', (e) => {
        if(e.target === popup){
            popup.classList.add('hidden');
        }
    });
</script>


  </div>


  

</body>
</html>
