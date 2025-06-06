<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil - Location de Matériel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
<<<<<<< HEAD
    <h1>Location de Matériel Informatique</h1>
    <div class="header-buttons">
        <?php if (isset($_SESSION['user_id'])): ?>
            <span class="welcome-msg">Bonjour, <?= htmlspecialchars($_SESSION['user_mail']) ?> 👋</span>
            <a href="reserver.php" class="btn">Réserver</a>
            <a href="materielle.php" class="btn">Matériel</a>
            <a href="logout.php" class="btn secondary">Déconnexion</a>
        <?php else: ?>
            <a href="login.php" class="btn">Connexion</a>
        <?php endif; ?>
    </div>
</header>

    <div class="container">
        <div class="box available">
            <h2>Matériel Disponible</h2>
=======
        <h1>Location de MatÃ©riel Informatique</h1>
        <a href="login.php" class="btn">Connexion</a>
    </header>

    <div class="container">
        <div class="box available">
            <h2>Disponible</h2>
>>>>>>> 203f44517fa04d9c16fad29264ff86fcffc2f28e
            <?php
            $stmt = $pdo->query("SELECT libelle FROM materielle WHERE estDisponible = 1");
            foreach ($stmt as $row) {
                echo "<p>" . htmlspecialchars($row['libelle']) . "</p>";
            }
            ?>
        </div>
<<<<<<< HEAD

        <div class="box unavailable">
            <h2>Matériel Indisponible</h2>
=======
        <div class="box unavailable">
            <h2>Indisponible</h2>
>>>>>>> 203f44517fa04d9c16fad29264ff86fcffc2f28e
            <?php
            $stmt = $pdo->query("SELECT libelle FROM materielle WHERE estDisponible = 0");
            foreach ($stmt as $row) {
                echo "<p>" . htmlspecialchars($row['libelle']) . "</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>