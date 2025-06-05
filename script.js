function togglePassword() {
    const mdp = document.getElementById("mdp");
    const mdp2 = document.getElementById("mdp2");
    const type = mdp.type === "password" ? "text" : "password";
    mdp.type = type;
    if (mdp2) mdp2.type = type;
}

function switchForm() {
    const title = document.getElementById("formTitle");
    const action = document.getElementById("formAction");
    const confirmPassword = document.getElementById("confirmPassword");
    const button = document.querySelector("form input[type='submit']");
    if (action.value === "login") {
        action.value = "register";
        title.textContent = "Inscription";
        confirmPassword.style.display = "block";
        button.value = "S'inscrire";
    } else {
        action.value = "login";
        title.textContent = "Connexion";
        confirmPassword.style.display = "none";
        button.value = "Se connecter";
    }
}
