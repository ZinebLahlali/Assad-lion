<?php 
   include "./dbconnect.php";

   if(isset($_POST['submit'])) {
      $nom = $_POST['nom'];
      $email = $_POST['email'];
      $role = $_['rôle'];
      $motpasse_hash= $_['motpasse_hash'];
     

      $sql = "INSERT INTO utilisateurs (nom,  email, rôle, motpasse_hash)
      VALUES ('$nom','$email','$rôle','$motpasse_hash')";
      if(mysqli_query($conn, $sql)){
        header("Location: users.php? success=1");
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
     <a href="#"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >utilisateurs</button> </a>
     <a href="/Assad-lion/animals.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >Animals</button> </a>
     <a href="/Assad-lion/habitats.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >Habitats</button> </a>
     <a href="/Assad-lion/statistiques.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >Statistiques</button> </a>
     <a href="#"> <button class="nav-btn px-4 py-2 rounded hover:bg-green-700" >Déconnexion</button> </a>
    </nav>
    </nav>
  </div>

  <!-- Main Content -->
<div class="w-full max-w-6xl mx-auto mt-6">
<?php
$sql = "SELECT * FROM utilisateurs";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="flex items-center px-5 py-4 bg-white rounded-lg shadow-sm">

            <div class="w-1/4 font-semibold text-gray-800">
                '.$row['nom'].'
            </div>

            <div class="w-1/3 text-gray-500 text-sm">
                '.$row['email'].'
            </div>

            <div class="w-1/6">
                <span class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">
                    '.$row['rôle'].'
                </span>
            </div>

            <div class="w-1/4 flex justify-end gap-2 text-sm">

                <!-- Activer -->
                <a href="activate_user.php?id=
                   class="px-2 py-1 rounded bg-green-50 text-black flex items-center gap-1"
                   title="Activer">
                    Activer
                </a>

                <!-- Désactiver -->
                <a href="deactivate_user.php?id= 
                   class="px-2 py-1 rounded bg-yellow-50 text-black flex items-center gap-1"
                   title="Désactiver">
                    Désactiver
                </a>

                <!-- Edit -->
                <a href="edit_user.php?id=
                   class="p-2 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center"
                   title="Edit">Modifier
                   
                </a>

                <!-- Delete -->
                <a href="delete_user.php?id=
                   onclick="return confirm(\'Are you sure?\')"
                   class="p-2 rounded-full bg-red-50 text-red-600 flex items-center justify-center"
                   title="Delete"> Supprimer
                   
                </a>

            </div>

        </div>

        <div class="h-px bg-gray-200 mx-5"></div>
        ';
    }
} else {
    echo '<p class="text-center text-gray-400 py-6">No users found.</p>';
}
?>
</div>


</div>





  <script src="script.js"></script>

</body>
</html>