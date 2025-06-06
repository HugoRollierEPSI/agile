<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil - Location</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Location de MatÃ©riel Informatique</h1>
        <a href="login.php" class="btn">Connexion</a>
    </header>

    <div class="container">
        <div class="box available">
            <h2>Disponible</h2>
            <?php
            $stmt = $pdo->query("SELECT libelle FROM materielle JOIN disponible ON materielle.estDisponible = disponible.id WHERE disponible.disponible = 1");
            while ($row = $stmt->fetch()) {
                echo "<p>{$row['libelle']}</p>";
            }
            ?>
        </div>
        <div class="box unavailable">
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