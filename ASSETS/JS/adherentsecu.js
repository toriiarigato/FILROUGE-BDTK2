(function() {
    var role = localStorage.getItem("role");

    if (role != "Adhérent") {
        window.location.replace("../HTML/login.html");
    }
}())