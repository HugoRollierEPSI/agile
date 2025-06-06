<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action']; // "login" ou "register"
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    // Vérification du mail EPSI
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@ecoles-epsi\.net$/', $mail)) {
        echo "Adresse mail non autorisée.";
        exit;
    }

    if ($action === "register") {
        $confirm = $_POST['confirm'];

        if ($mdp !== $confirm) {
            echo "Les mots de passe ne correspondent pas.";
            exit;
        }

        // Enregistrement sans hachage (⚠️ pour tests uniquement)
        $stmt = $pdo->prepare("INSERT INTO utilisateur (mail, mdp) VALUES (?, ?)");
        $stmt->execute([$mail, $mdp]);

        header("Location: login.php"); // ou index.php selon ton choix
        exit;
    }

    if ($action === "login") {
        // Connexion avec mot de passe en clair
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE mail = ?");
        $stmt->execute([$mail]);
        $user = $stmt->fetch();

        if ($user && $user['mdp'] === $mdp) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_mail'] = $user['mail'];
            header("Location: index.php");
            exit;
        } else {
            echo "Identifiants incorrects.";
        }
    }
}
?>
