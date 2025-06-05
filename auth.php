<?php
include 'db.php';
session_start();

$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$action = $_POST['action'];

if (!preg_match('/@ecoles-epsi\.net$/', $mail)) {
    die("Mail invalide.");
}

if ($action === "register") {
    $mdp2 = $_POST['mdp2'];
    if ($mdp !== $mdp2) {
        die("Les mots de passe ne correspondent pas.");
    }
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO utilisateur (mail, mdp) VALUES (?, ?)");
    $stmt->execute([$mail, $hash]);
    echo "Inscription réussie. <a href='login.php'>Connexion</a>";
} else if ($action === "login") {
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE mail = ?");
    $stmt->execute([$mail]);
    $user = $stmt->fetch();
    if ($user && password_verify($mdp, $user['mdp'])) {
        $_SESSION['user'] = $user['id'];
        header("Location: index.php");
    } else {
        echo "Identifiants incorrects.";
    }
}
?>
