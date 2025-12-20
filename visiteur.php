<?php 
include "./dbconnect.php";





?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Zoo Virtuel – Animaux</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- ===== Page Wrapper ===== -->
    <div class="min-h-screen">

        <!-- ===== Header ===== -->
        <header class="bg-green-600 text-white p-6 shadow-md">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold">Zoo Virtuel</h1>
                <p class="mt-1 text-green-100">Explorez les animaux et découvrez leur habitat et pays d’origine</p>
            </div>
        </header>

        <!-- ===== Main Content ===== -->
        <main class="flex-1 max-w-6xl mx-auto p-6 space-y-6">

            <!-- ===== Filters ===== -->
            <section class="bg-white p-4 rounded-lg shadow flex flex-wrap items-end gap-4">
                <div class="flex flex-col">
                    <form method="GET" action="visiteur.php">
                    <label class="mb-1 font-semibold">Habitat</label>
                    <select class="border rounded px-3 py-2" name="habitat">
                        <option value="">Tous les habitats</option>
                     <?php
                            $habitats = mysqli_query($conn, "SELECT id_habitat, nom FROM habitats");
                            while ($row = mysqli_fetch_assoc($habitats)) {
                                echo '<option value="' . $row['id_habitat'] . '">' . $row['nom'] . '</option>';
                    }
                    ?>
                        
                    </select>
                    </form>
                </div>

                <div class="flex flex-col">
                    <form method="GET" action="visiteur.php">
                    <label class="mb-1 font-semibold">Pays africain</label>
                    <select class="border rounded px-3 py-2" name="pays">
                        <option value="">Tous les pays</option>
                          <?php
                    $animals = mysqli_query($conn, "SELECT id_animal, paysorigine FROM animaux");
                    while ($row = mysqli_fetch_assoc($animals)) {
                        echo '<option value="' . $row['id_animal'] . '">' . $row['paysorigine'] . '</option>';
                    }
                    ?>
                      
                    </select>
                    </form>
                </div>

                <button class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">
                    Filtrer
                </button>
            </section>

            <!-- ===== Animals Grid ===== -->
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <?php
                $sql = "SELECT animaux.*, habitats.nom AS habitat_nom 
                        FROM animaux 
                        INNER JOIN habitats 
                        ON animaux.id_habitat = habitats.id_habitat";

                $result = mysqli_query($conn, $sql);

                if($result && mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">';
                        echo '<img src="' . $row['image'] . '" class="w-full h-48 object-cover">';
                        echo '<div class="p-4">';
                        echo '<h3 class="text-lg font-bold text-gray-800 mb-2">' . $row['nom'] . '</h3>';
                        echo '<p class="text-gray-600"><span class="font-semibold">Espèce:</span> ' . $row['espèce'] . '</p>';
                        echo '<p class="text-gray-600"><span class="font-semibold">Alimentation:</span> ' . $row['alimentation'] . '</p>';
                        echo '<p class="text-gray-600"><span class="font-semibold">Pays:</span> ' . $row['paysorigine'] . '</p>';
                        echo '<p class="text-gray-600 mb-3"><span class="font-semibold">Description:</span> ' . $row['descriptioncourte'] . '</p>';
                        echo '<p class="text-gray-600 mb-3"><span class="font-semibold">Habitat:</span> ' . $row['habitat_nom'] . '</p>';
                        echo '</div>';
                        echo '</article>';
                    }
                } else {
                    echo '<p class="col-span-full text-center text-gray-500">Aucun animal trouvé.</p>';
                }
                ?>

            </section>

        </main>

        <!-- ===== Footer ===== -->
        <footer class="bg-gray-800 text-gray-200 p-4 text-center">
            © Zoo Virtuel – Tous droits réservés
        </footer>

    </div>

</body>
</html>
