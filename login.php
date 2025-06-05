<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion / Inscription</title>
    <script src="script.js" defer></script>
</head>
<body>
    <h2 id="formTitle">Connexion</h2>
    <form method="POST" action="auth.php">
        <input type="hidden" name="action" value="login" id="formAction">
        <input type="email" name="mail" placeholder="Mail" required pattern=".+@ecoles-epsi\.net"><br>
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>
        <input type="checkbox" onclick="togglePassword()"> Voir le mot de passe<br>
        <div id="confirmPassword" style="display:none;">
            <input type="password" name="mdp2" id="mdp2" placeholder="Confirmer le mot de passe"><br>
        </div>
        <input type="submit" value="Valider">
    </form>
    <button onclick="switchForm()">Changer en inscription</button>
</body>
</html>
