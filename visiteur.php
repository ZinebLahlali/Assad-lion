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

    <div class="min-h-screen">

        <header class="bg-green-600 text-white p-6 shadow-md">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
      
        <div>
           <a><h1 class="text-3xl font-bold">Zoo Virtuel</h1></a> 
            <p class="mt-1 text-green-100">Explorez les animaux et découvrez leur habitat et pays d’origine</p>
        </div>

        <a href="assadfiche.php">
            <button class="bg-yellow-400 text-gray-800 px-4 py-2 rounded-lg hover:bg-yellow-500 transition">
                Lion d'Atlas
            </button>
        </a>
        
    </div>
</header>

        <main class="flex-1 max-w-6xl mx-auto p-6 space-y-6">
            <!--Section Réservation -->
<section class="bg-white p-6 rounded-xl shadow-lg mt-6 max-w-2xl mx-auto">
    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Réservez votre visite guidée pour Asaad – Lion des Atlas</h3>

    <form method="POST" action="reserver.php" class="space-y-4">
       
        <div class="flex flex-col">
            <label for="date" class="font-semibold mb-1">Date de la visite</label>
            <input type="date" id="date" name="date" class="border rounded px-3 py-2" required>
        </div>

       
        <div class="flex flex-col">
            <label for="heure" class="font-semibold mb-1">Heure de début</label>
            <input type="time" id="heure" name="heure" class="border rounded px-3 py-2" required>
        </div>

       
        <div class="flex flex-col">
            <label for="personnes" class="font-semibold mb-1">Nombre de personnes</label>
            <input type="number" id="personnes" name="personnes" min="1" max="10" value="1" class="border rounded px-3 py-2" required>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                Réserver
            </button>
        </div>
    </form>
</section>


          
            <section class="bg-white p-4 rounded-lg shadow flex flex-wrap items-end gap-4">
                <div class="flex flex-col">
                   <form method="GET" action="visiteur.php" class="bg-white p-4 rounded-lg shadow flex flex-wrap items-end gap-4">

                            <div class="flex flex-col">
                                <label class="mb-1 font-semibold">Habitat</label>
                                <select name="habitat" class="border rounded px-3 py-2">
                                    <option value="">Tous les habitats</option>
                                    <?php
                                    $habitats = mysqli_query($conn, "SELECT id_habitat, nom FROM habitats");
                                    while ($h = mysqli_fetch_assoc($habitats)) {
                                        $selected = ($_GET['habitat'] ?? '') == $h['id_habitat'] ? 'selected' : '';
                                        echo "<option value='{$h['id_habitat']}' $selected>{$h['nom']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label class="mb-1 font-semibold">Pays africain</label>
                                <select name="pays" class="border rounded px-3 py-2">
                                    <option value="">Tous les pays</option>
                                    <?php
                                    $pays = mysqli_query($conn, "SELECT DISTINCT paysorigine FROM animaux");
                                    while ($p = mysqli_fetch_assoc($pays)) {
                                        $selected = ($_GET['pays'] ?? '') == $p['paysorigine'] ? 'selected' : '';
                                        echo "<option value='{$p['paysorigine']}' $selected>{$p['paysorigine']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">
                                Filtrer
                            </button>

                        </form>


            </section>

          
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <?php
                $pays = $_GET['pays'] ?? '';
                $habitat = $_GET['habitat'] ?? '';

                $sql = "SELECT animaux.*, habitats.nom AS habitat_nom 
                        FROM animaux 
                        INNER JOIN habitats 
                        ON animaux.id_habitat = habitats.id_habitat";

                        if ($habitat != '') {
                                $sql .= " AND animaux.id_habitat = '" . mysqli_real_escape_string($conn, $habitat) . "'";
                            }

                            if ($pays != '') {
                                $sql .= " AND animaux.paysorigine = '" . mysqli_real_escape_string($conn, $pays) . "'";
                            }


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


        <footer class="bg-gray-800 text-gray-200 p-4 text-center">
            © Zoo Virtuel – Tous droits réservés
        </footer>

    </div>

</body>
</html>
