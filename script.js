function togglePassword() {
    const pwd = document.getElementById("mdp");
    pwd.type = (pwd.type === "password") ? "text" : "password";

    const pwd2 = document.getElementById("mdp2");
    if (pwd2) {
        pwd2.type = (pwd2.type === "password") ? "text" : "password";
    }
}

function switchForm() {
    const title = document.getElementById("formTitle");
    const action = document.getElementById("formAction");
    const confirmDiv = document.getElementById("confirmPassword");

    if (action.value === "login") {
        title.textContent = "Inscription";
        action.value = "register";
        confirmDiv.style.display = "block";
    } else {
        title.textContent = "Connexion";
        action.value = "login";
        confirmDiv.style.display = "none";
    }
}
