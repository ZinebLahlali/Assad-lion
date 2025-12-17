<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Zoo Manager Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('https://i.pinimg.com/1200x/91/77/fc/9177fc397883e3fbe4c5a2e4a67db8d4.jpg')] text-white flex h-screen">

  <!-- Sidebar -->
  <div class="w-64 bg-gray-800 flex flex-col p-4">
    <h1 class="text-xl font-bold mb-6">ASSAD ZOO</h1>
    <nav class="flex flex-col gap-4">
     <a href="#"> <button class="nav-btn bg-green-700 px-4 py-2 rounded" data-page="dashboard">Dashboard</button></a>
          <a href="/Assad-lion/createdit.php"> <button class="nav-btn px-4 py-2 rounded" data-page="dashboard">Create a visite</button></a>
     <a href="/Assad-lion/reservations.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="reservations">Reservations</button> </a>
     <a href="/Assad-lion/guide.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="visites">Guided Visits</button> </a>
     <a href="/Assad-lion/animals.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="animals">Animals</button> </a>
     <a href="/Assad-lion/habitats.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="habitats">Habitats</button> </a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="flex-1 p-6 overflow-auto">
    <!-- Dashboard -->
    <div class="page" id="dashboard">
      <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
      <p>Good Morning, Ranger. System systems are optimal. Weather conditions are favorable for all open-air habitats.</p>
    </div>

    <!-- Reservations -->
    <div class="page hidden" id="reservations">
      <h2 class="text-2xl font-bold mb-4">Reservations</h2>
      <p>Manage all park reservations here.</p>
    </div>



  

 

  <script src="script.js"></script>

</body>
</html>
