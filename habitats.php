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
          <a href="/Assad-lion/createdit.php"> <button class="nav-btn px-4 py-2 rounded" data-page="dashboard">Create a visite</button></a>
     <a href="/Assad-lion/reservations.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="reservations">Reservations</button> </a>
     <a href="/Assad-lion/guide.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="visites">Guided Visits</button> </a>
     <a href="/Assad-lion/animals.php"> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="animals">Animals</button> </a>
     <a href=""> <button class="nav-btn px-4 py-2 rounded hover:bg-gray-700" data-page="habitats">Habitats</button> </a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="flex-1 p-6 overflow-auto">
    <!-- Habitats -->
    <div class="page hidden" id="habitats">
      <h2 class="text-2xl font-bold mb-4">Habitats</h2>
      <p>Check habitat status and conditions.</p>
    </div>
  </div>

  <script src="script.js"></script>

</body>
</html>
