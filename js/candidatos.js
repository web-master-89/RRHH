if (filename() === "candidatos.php") {
    var alertaIns = document.querySelector(".alertaIns");
    alertaIns.style.display = "none";
    var formCandidato = document.querySelector(".formCandidato");
    formCandidato.addEventListener("submit", function(e) {
        e.preventDefault();
        var form = new FormData(formCandidato);
        //console.log(form.get("salary"));
        var xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // console.log(xhr.responseText);
                var respuesta = JSON.parse(xhr.responseText);
                //  console.log(respuesta.inscripcion);
                limpiar();
                alerta(respuesta.inscripcion, respuesta.personal);

            }
        }
        xhr.open("POST", "http://localhost/login/assets/candidatos.php", true);
        xhr.send(form);
    }, false);

} else if (filename() === "interviewers.php?rol=2") {
    var descripcion = document.querySelector("#descripcion");
    var puesto = document.querySelector("#puesto");
    var propuestasForm = document.querySelector("#propuestasForm");
    propuestasForm.addEventListener('submit', function(e) {
        e.preventDefault()
        var form = new FormData(propuestasForm);
        var xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var datos = JSON.parse(xhr.responseText);
                console.log(datos);
                Swal.fire(
                    'Perfecto!',
                    `${datos}`,
                    'success'
                ).then(data => console.log("lklk"));
                limpiarPropuesta();
            }
        }
        xhr.open("POST", "http://localhost/login/assets/propuestas.php", true);
        xhr.send(form);
    }, false);
}

function filename() {
    var rutaAbsoluta = self.location.href;
    var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
    var rutaRelativa = rutaAbsoluta.substring(posicionUltimaBarra + "/".length, rutaAbsoluta.length);
    return rutaRelativa;
}

function limpiar() {
    var nombre = document.getElementById("nombre");
    nombre.value = " ";
    var apellido = document.getElementById("apellido");
    apellido.value = " ";
    var mail = document.getElementById("mail");
    mail.value = " ";
    var select = document.querySelector("select");
    select.selectedIndex = 0;
    var salary = document.getElementById("salary");
    salary.value = " ";
}

function alerta(titulo, descripcion) {
    var titlealert = document.querySelector(".tituloAlert");
    titlealert.innerHTML = titulo;
    var descAlert = document.querySelector(".descAlert");
    descAlert.innerHTML = descripcion;
    alertaIns.style.display = "block";
}

function limpiarPropuesta() {
    var propuesta = document.getElementById("puesto");
    propuesta.value = " ";
    var descripcion = document.getElementById("descripcion");
    descripcion.value = " ";
}