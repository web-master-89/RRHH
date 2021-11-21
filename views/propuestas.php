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
          header("location:./propuestas.php?rol=".$_GET["rol"]);
      }
  }else if($_SESSION["nombre"] === null)
    {
      header("location:../index.html");
    }
 ?>
<?php require "./layouts/links.php"; ?>
<?php require "./layouts/header.php"; ?>
<?php require "./layouts/nav.php"; ?>
<div class="col-10">
<table id="propuesta" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>id</th>
                <th>descripcion</th>
                <th>puesto</th>
                <th>eliminar</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>id</th>
                <th>descripcion</th>
                <th>puesto</th>
                <th>eliminar</th>
            </tr>
        </tfoot>
    </table>
</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php require "./layouts/scripts.php"; ?>
<script>
    $(document).ready(function() {
        var dato = "propuesta"
        $('#propuesta').DataTable( {
            "ajax": {
            "url": "http://localhost/login/assets/propuestas.php",
            "type": "GET",
            "data": { 'propuesta' : dato }
            },
            "scrollY":"300px",
            "scrollCollapse": true,
            "columns":[
                { "data": "id" },
                { "data": "descripcion" },
                { "data": "puesto" },
                { "defaultContent": "<button class='eliminar btn btn-success'>delete</button>"}
            ],
            "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "<b class='parrafo'>Showing page _PAGE_ of _PAGES_</p>",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
            }
        } );
        $("#propuesta").on('click', ".eliminar", function (event) {
            event.preventDefault();
            let row = $(this).parent().parent();
             // alert(datos.find('td').eq(6).text());
            let id = row.find('td').eq(0).text();
            Swal.fire(
                    'Perfecto!',
                    `eliminaciòn`,
                    'success'
                );
                setTimeout(() => {
                    window.location.href=`../assets/propuestas.php?id=${id}`;
                }, 400);
        });
    } );
</script>
