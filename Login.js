document.addEventListener("DOMContentLoaded", () => {
    const loginSection = document.getElementById("login");
    const registerSection = document.getElementById("register");

    const loginLink = document.getElementById("login-link");
    const registerLink = document.getElementById("register-link");
    const guestLink = document.getElementById("guest-link");

    const showRegister = document.getElementById("show-register");
    const showLogin = document.getElementById("show-login");

    registerLink.addEventListener("click", () => {
        loginSection.style.display = "none";
        registerSection.style.display = "block";
    });
    loginLink.addEventListener("click", () => {
        registerSection.style.display = "none";
        loginSection.style.display = "block";
    });
    showRegister.addEventListener("click", (e) => {
        e.preventDefault();
        loginSection.style.display = "none";
        registerSection.style.display = "block";
    });
    showLogin.addEventListener("click", (e) => {
        e.preventDefault();
        registerSection.style.display = "none";
        loginSection.style.display = "block";
    });
    guestLink.addEventListener("click", () => {
        alert("You are continuing as a guest!");
    });
});