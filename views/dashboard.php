<?php
session_start();
if ($_SESSION["nombre"] != null)
  {
    $_SESSION["nombre"];
    $_SESSION["apellido"];
    $_SESSION["hora"];
    $_SESSION["fecha"];
    $_SESSION["user_id"];
    $_SESSION["rol"];
    if($_GET["rol"] !== $_SESSION["rol"])
      {
          $_GET["rol"] = $_SESSION["rol"];
          header("location:./dashboard.php?rol=".$_GET["rol"]);
      }
  }else if($_SESSION["nombre"] === null)
    {
      header("location:../index.html");
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php require "./layouts/links.php"; ?>
</head>
<body>
  <?php require "./layouts/header.php"; ?>
  <?php require "./layouts/nav.php"; ?>
  <div class="tablaDashboard col-11">
    <table id="candiTable" class="cell-border" style="background-color: white;">
      <thead>
        <tr>
          <th>id</th>
          <th>nombre</th>
          <th>apellido</th>
          <th>mail</th>
          <th>puesto</th>
          <th>salario</th>
          <th>cv</th>
          <th>entrevistador</th>
          <th>descarga_cv</th>
          <th>visto</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>id</th>
          <th>nombre</th>
          <th>apellido</th>
          <th>mail</th>
          <th>puesto</th>
          <th>salario</th>
          <th>cv</th>
          <th>entrevistador</th>
          <th>descarga_cv</th>
          <th>visto</th>
        </tr>
      </tfoot>
    </table>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php require "./layouts/scripts.php"; ?>
<script>
  $(document).ready(function() {
      $('#candiTable').DataTable({
          "ajax": {
            "url": "http://localhost/login/assets/dashboard.php"
            },
            "scrollX": "true",
            "columns":[
                { "data": "id" },
                { "data": "nombre" },
                { "data": "apellido"},
                { "data": "mail"},
                { "data": "puesto"},
                { "data": "salario_aprox"},
                { "data": "cvpath"},
                { "data": "apellido"},
                { "defaultContent": "<button class='descarga btn btn-success'>download</button>"},
                { "defaultContent": "<button class='view btn btn-primary'>Visto</button>"}
            ],
            "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "<b class='parrafo'>Showing page _PAGE_ of _PAGES_</p>",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
       $(window).mousemove(function (e){carga()});
        function carga() {
          var form = new FormData();
            //console.log(form.get("salary"));
            var xhr = new XMLHttpRequest();
            form.append('cheque', "cv");
            xhr.onload = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // console.log(xhr.responseText);
                    var respuesta = JSON.parse(xhr.responseText).visto;
                    let datos = $("#candiTable").dataTable().fnGetNodes();
                    for(var i=0;i<datos.length;i++)
                      {
                        console.log(respuesta[i].visto);
                        if (respuesta[i].visto === "SI") {
                          datos[i].style.backgroundColor = "red";
                        }
                      }

                }
            }
            xhr.open("POST", "http://localhost/login/assets/downloads.php", true);
            xhr.send(form);
        }
          $('#candiTable tbody').on('click', '.descarga',function (e) {
              e.preventDefault();
              //alert(datos.find('td').eq(2).text());
              let datos = $(this).parent().parent();
              let cv = datos.find('td').eq(6).text();
              window.location.href = `../assets/downloads.php?descarga=${cv}`;
          });
          $('#candiTable tbody').on('click', '.view',function (e) {
              e.preventDefault();
              let datos = $(this).parent().parent();
              let cv = datos.find('td').eq(0).text();
              alert(cv);
              var form = new FormData();
                form.append('saludos', "si");
                form.append('id', cv);
               // console.log(form.get('saludos'));
                var xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // console.log(xhr.responseText);
                        var respuesta = JSON.parse(xhr.responseText);
                        console.log(respuesta);
                        if (respuesta === "si") {
                            datos.css({
                                'background': 'red'
                            });
                        }
                    }
                }
                xhr.open("POST", "http://localhost/login/assets/downloads.php", true);
                xhr.send(form);
          });
            
    } );
</script>
</body>
</html>