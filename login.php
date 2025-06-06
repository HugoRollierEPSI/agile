<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion / Inscription</title>
    <link rel="stylesheet" href="style.css">
<<<<<<< HEAD
    <script src="script.js"></script>
</head>
<body>

<div class="form-container">
    <h2 id="formTitle">Connexion</h2>

    <form id="authForm" method="POST" action="auth.php">
        <input type="hidden" name="action" value="login" id="formAction">

        <label for="mail">Email :</label>
        <input type="email" name="mail" required>

        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required>

        <div id="confirmPassword" style="display: none;">
            <label for="mdp2">Confirmer le mot de passe :</label>
            <input type="password" name="confirm" id="mdp2">
        </div>

        <label style="text-align: left;">
            <input type="checkbox" id="showPwd" onclick="togglePassword()"> Afficher les mots de passe
        </label>

        <button type="submit" class="btn full" id="submitBtn">Connexion</button>
    </form>

    <p style="margin-top: 20px;">
        <span id="switchText">Pas encore de compte ?</span>
        <a href="#" onclick="switchForm()">S’inscrire</a>
    </p>
</div>

<script src="scrypt.js"></script>
=======
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Connexion / Inscription</h1>
        <a href="index.php" class="btn">Retour</a>
    </header>

    <div class="form-container">
        <h2 id="formTitle">Connexion</h2>
        <form method="POST" action="auth.php">
            <input type="hidden" name="action" value="login" id="formAction">

            <label for="mail">Adresse mail :</label>
            <input type="email" name="mail" required pattern=".+@ecoles-epsi\.net" placeholder="prenom.nom@ecoles-epsi.net">

            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" required placeholder="Mot de passe">
            <label><input type="checkbox" onclick="togglePassword()"> Voir le mot de passe</label>

            <div id="confirmPassword" style="display:none;">
                <label for="mdp2">Confirmer le mot de passe :</label>
                <input type="password" name="mdp2" id="mdp2" placeholder="Confirmez le mot de passe">
            </div>

            <input type="submit" value="Valider" class="btn full">
        </form>
        <button onclick="switchForm()" class="btn secondary">Changer en inscription</button>
    </div>
>>>>>>> 203f44517fa04d9c16fad29264ff86fcffc2f28e
</body>
</html>