(function() {
    var role = localStorage.getItem("role");

    if (role != "Bibliothécaire") {
        window.location.replace("../HTML/login.html");
    }
}())