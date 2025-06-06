<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion / Inscription</title>
    <link rel="stylesheet" href="style.css">
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
</body>
</html>