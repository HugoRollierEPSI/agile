<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['reserver_id'])) {
    $materiel_id = intval($_POST['reserver_id']);

    $stmt = $pdo->prepare("UPDATE materielle SET estDisponible = 0, id_utilisateur = ? WHERE id = ?");
    $stmt->execute([$_SESSION['user_id'], $materiel_id]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Réserver du matériel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Réserver du Matériel Disponible</h1>
        <a href="index.php" class="btn">Accueil</a>
        <a href="materielle.php" class="btn">Mon Matériel</a>
    </header>

    <div class="container">
        <div class="box available" style="width: 60%;">
            <h2>Matériel disponible à la réservation</h2>
            <?php
            $stmt = $pdo->query("SELECT id, libelle FROM materielle WHERE estDisponible = 1 AND id_utilisateur IS NULL");
            $materiels = $stmt->fetchAll();

            if (count($materiels) === 0) {
                echo "<p>Aucun matériel disponible pour le moment.</p>";
            } else {
                foreach ($materiels as $m) {
                    echo "<form method='POST' style='margin-bottom: 15px;'>
                            <span>{$m['libelle']}</span>
                            <input type='hidden' name='reserver_id' value='{$m['id']}'>
                            <button type='submit' class='btn full' style='margin-left: 10px;'>Réserver</button>
                          </form>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
