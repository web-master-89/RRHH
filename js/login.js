var formulario = document.getElementById("formlogin");
//http para logueo
formulario.addEventListener("submit", function(event) {
    event.preventDefault();
    //console.log(mail.value);
    var form = new FormData(formulario);
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // console.log(xhr.responseText);
            var resLogin = JSON.parse(xhr.responseText);
            console.log(resLogin);
            if (resLogin.logueado === "1") {
                window.location.href = `./views/dashboard.php?rol=${resLogin.logueado}`;
            } else if (resLogin.logueado === "2") {
                window.location.href = `./views/interviewers.php?rol=${resLogin.logueado}`;
            } else {
                window.location.href = "./index.html";
                // console.log(resLogin);
            }
        }
    }
    xhr.open("POST", "http://localhost/login/assets/login.php", true);
    xhr.send(form);
}, false);