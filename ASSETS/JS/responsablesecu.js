(function() {
    var role = localStorage.getItem("role");

    if (role != "Responsable") {
        window.location.replace("../HTML/login.html");
    }
}())