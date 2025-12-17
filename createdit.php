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
     <a href="/Assad-lion/home.php"> <button class="nav-btn bg-green-700 px-4 py-2 rounded" data-page="dashboard">Dashboard</button></a>
     <a href="#"> <button class="nav-btn px-4 py-2 rounded" data-page="dashboard">Create a visite</button></a>
     <a href="/Assad-lion/reservations.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="reservations">Reservations</button> </a>
     <a href="/Assad-lion/guide.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="visites">Guided Visits</button> </a>
     <a href="/Assad-lion/animals.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="animals">Animals</button> </a>
     <a href="/Assad-lion/habitats.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="habitats">Habitats</button> </a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="flex-1 p-6 overflow-auto">
   


<div class="max-w-4xl mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-green-800">Créer une visite guidée</h1>

  <form action="save-visite.php" method="POST" class="bg-white p-6 rounded-xl shadow-lg space-y-4">

    <input type="text" name="titre" placeholder="Titre de la visite" 
           class="w-full p-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-500" required>

    <textarea name="description" placeholder="Description" 
              class="w-full p-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-500" required></textarea>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <input type="date" name="date" 
             class="p-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-500" required>
      <input type="time" name="heure_debut" 
             class="p-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-500" required>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <input type="number" name="duree" placeholder="Durée (min)" 
             class="p-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-500" required>
      <input type="number" name="prix" placeholder="Prix (€)" 
             class="p-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-500" required>
      <input type="number" name="capacite_max" placeholder="Capacité max" 
             class="p-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-500" required>
    </div>

    <select name="langue" 
            class="w-full p-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-500" required>
      <option value="" disabled selected >Langue</option>
      <option value="Français" class="text-black">Français</option>
      <option value="Anglais"  class="text-black">Anglais</option>
      <option value="Arabe"  class="text-black">Arabe</option>
    </select>

    <button type="submit" 
            class="bg-green-700 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600 hover:shadow-green-900/50 transition duration-300">
      Créer la visite
    </button>

  </form>
</div>






  <script src="script.js"></script>

</body>
</html>
