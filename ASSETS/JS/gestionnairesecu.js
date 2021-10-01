(function() {
    var role = localStorage.getItem("role");

    if (role != "Gestionnaire de fond") {
        window.location.replace("../HTML/login.html");
    }
}())