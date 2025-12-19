<?php 
   include "./dbconnect.php";

   if(isset($_POST['submit'])) {
      $nom = $_POST['nom'];
      $espece = $_POST['espece'];
      $alimentation = $_['alimentation'];
      $image = $_['image'];
      $paysorigine = $_['paysorigine'];
      $descriptioncourte = $_['descriptioncourte'];

      $sql = "INSERT INTO animaux (nom, espèce, alimentation, image, paysorigine, descriptioncourte)
      VALUES ('$nom','$espece','$alimentation','$image','$paysorigine','$descriptioncourte')";
      if(mysqli_query($conn, $sql)){
        header("Location: animals.php? success=1");
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

  <!-- Animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to   { opacity: 1; transform: scale(1); }
    }
  </style>
</head>

<body class="bg-gray-900 text-white flex h-screen">

<!-- Sidebar -->
<div class="w-64 bg-gray-800 flex flex-col p-4">
  <h1 class="text-xl font-bold mb-6">ASSAD ZOO</h1>

  <nav class="flex flex-col gap-4">
    <a href="/Assad-lion/home.php" class="px-4 py-2 rounded hover:bg-green-700">Dashboard</a>
    <a href="/Assad-lion/users.php" class="px-4 py-2 rounded hover:bg-green-700">Utilisateurs</a>
    <a href="#" class="px-4 py-2 rounded hover:bg-green-700">Animals</a>
    <a href="/Assad-lion/habitats.php" class="px-4 py-2 rounded hover:bg-green-700">Habitats</a>
    <a href="/Assad-lion/statistiques.php" class="px-4 py-2 rounded hover:bg-green-700">Statistiques</a>
    <a href="#" class="px-4 py-2 rounded hover:bg-green-700">Déconnexion</a>
  </nav>
</div>


<div class="flex-1 p-6">


<div class="flex-1 p-6 flex justify-end">

  <button
    onclick="openModal()"
    class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
    + Ajouter un animal
  </button>

</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
<?php
$sql = "SELECT * FROM animaux";
$result = mysqli_query($conn, $sql);
if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">';
        echo '<img src="' . $row['image'] . '" class="w-full h-48 object-cover">';
        echo '<div class="p-4">';
        echo '<h3 class="text-lg font-bold text-gray-800 mb-2">' . $row['nom'] . '</h3>';
        echo '<p class="text-gray-600"><span class="font-semibold">Espèce:</span> ' . $row['espèce'] . '</p>';
        echo '<p class="text-gray-600"><span class="font-semibold">Alimentation:</span> ' . $row['alimentation'] . '</p>';
        echo '<p class="text-gray-600"><span class="font-semibold">Pays:</span> ' . $row['paysorigine'] . '</p>';
        echo '<p class="text-gray-600 mb-3"><span class="font-semibold">Description:</span> ' . $row['descriptioncourte'] . '</p>';

        echo '<div class="flex gap-2">';
        echo '<a href="edit_animal.php?id='. $row["id_animal"]. '" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-lg transition">Edit</a>';
echo '<a href="delete_animal.php?id=' . $row['id_animal'] . '" 
class="flex-1 bg-red-500 hover:bg-red-600 text-white text-center py-2 rounded-lg transition" 
onclick="return confirm(\'Are you sure you want to delete this animal?\')">
Delete
</a>';
        echo '</div>';

        echo '</div>'; 
        echo '</div>'; 
    }
} else {
    echo '<p class="col-span-3 text-center text-gray-400">No animals found.</p>';
}
?>
</div>

<div id="animalModal" class="fixed inset-0 z-50 hidden flex items-center justify-center">

  
  <div onclick="closeModal()"
       class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

 
  <div class="relative bg-white text-gray-800 w-full max-w-lg rounded-2xl shadow-2xl p-6 animate-[fadeIn_0.3s_ease-out]">

  
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-semibold">Ajouter un animal</h2>
      <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl">
        &times;
      </button>
    </div>

 
    <form method="POST" class="grid gap-3">

      <input type="text" name="name" placeholder="Nom"
             class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">

      <input type="text" name="species" placeholder="Espèce"
             class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">

      <input type="url" name="image" placeholder="Image URL"
             class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">

       <select name="type_alimentaire" class="border p-1 w-full mb-2" required>
                    <option value="" selected disabled>Select</option>
                    <option value="Carnivore">Carnivore</option>
                    <option value="Herbivore">Herbivore</option>
                    <option value="Omnivore">Omnivore</option>
                </select>
      <input type="text" name="country" placeholder="Pays d'origine"
             class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">

       <select name="Id_habitat" class="border p-1 w-full mb-2" required>
                    <option value="" selected disabled>Select habitat</option>
                    <?php
                    $habitats = mysqli_query($conn, "SELECT id_habitat, nom FROM habitats");
                    while ($row = mysqli_fetch_assoc($habitats)) {
                        echo '<option value="' . $row['id_habitat'] . '">' . $row['nom'] . '</option>';
                    }
                    ?>
                </select>

      <textarea name="description" rows="3" placeholder="Description courte"
                class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none"></textarea>

    
      <div class="flex gap-3 mt-4">
        <button type="submit"
                class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
          Enregistrer
        </button>

        <button type="button"
                onclick="closeModal()"
                class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition">
          Annuler
        </button>
      </div>

    </form>
  </div>
  

</div>



<script>
function openModal() {
  document.getElementById("animalModal").classList.remove("hidden");
}
function closeModal() {
  document.getElementById("animalModal").classList.add("hidden");
}
 const btnEdit = document.getElementById("btnEdit");
 const editForm = document.getElementById("editForm");
 btnEdit.addEventListener('click',() =>{
  editForm.classList.remove("hidden");
 })


</script>

</body>
</html>
