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
          header("location:./interviewers.php?rol=".$_GET["rol"]);
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
    <div class="card text-white bg-dark mb-3" >
    <label for="propuestasForm" class="form-label labelPropuesta">Propesutas Labolares:</label>
      <form id="propuestasForm">
        <div class="mb-3 col-11">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
        </div>
        <div class="mb-3 col-10" style="margin-top:33px;">
          <label for="puesto" class="form-label">Puesto</label>
          <input type="text" class="form-control" id="puesto" name="puesto">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <script src="../js/candidatos.js"></script>
    <?php require "./layouts/scripts.php"; ?>
</body>
</html>