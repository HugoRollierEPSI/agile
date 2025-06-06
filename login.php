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

</body>
</html>