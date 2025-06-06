<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['rendu_id'])) {
    $materiel_id = intval($_POST['rendu_id']);

    $stmt = $pdo->prepare("UPDATE materielle SET estDisponible = 1, id_utilisateur = NULL WHERE id = ?");
    $stmt->execute([$materiel_id]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mon Matériel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Matériel Emprunté</h1>
        <a href="index.php" class="btn">Accueil</a>
    </header>

    <div class="container">
        <div class="box available" style="width: 60%;">
            <h2>Votre matériel actuel</h2>
            <?php
            $stmt = $pdo->prepare("SELECT id, libelle FROM materielle WHERE id_utilisateur = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $materiels = $stmt->fetchAll();

            if (count($materiels) === 0) {
                echo "<p>Aucun matériel en cours d'emprunt.</p>";
            } else {
                foreach ($materiels as $m) {
                    echo "<form method='POST' style='margin-bottom: 15px;'>
                            <span>{$m['libelle']}</span>
                            <input type='hidden' name='rendu_id' value='{$m['id']}'>
                            <button type='submit' class='btn secondary' style='margin-left: 10px;'>Marquer comme rendu</button>
                          </form>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
