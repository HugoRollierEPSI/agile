<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil - Location</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Matériel Informatique</h1>
    <div class="container">
        <div class="box">
            <h2>Disponible</h2>
            <?php
            $stmt = $pdo->query("SELECT libelle FROM materielle JOIN disponible ON materielle.estDisponible = disponible.id WHERE disponible.disponible = 1");
            while ($row = $stmt->fetch()) {
                echo "<p>{$row['libelle']}</p>";
            }
            ?>
        </div>
        <div class="box">
            <h2>Indisponible</h2>
            <?php
            $stmt = $pdo->query("SELECT libelle FROM materielle JOIN disponible ON materielle.estDisponible = disponible.id WHERE disponible.disponible = 0");
            while ($row = $stmt->fetch()) {
                echo "<p>{$row['libelle']}</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
