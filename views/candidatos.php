<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "./layouts/links.php"; ?>
</head>
<body>
  <?php require "./layouts/headerCandidatos.php"; ?>
  <?php require "./layouts/navCandidatos.php"; ?>
  <div class="divformularioCan">
      <div class="mt-1"></div>
        <form class="formCandidato">
            <div class="columnaRow">
                <div class="row">
                    <div class="mb-3 col-2 mt-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        name="nombre" 
                        id="nombre" 
                        aria-describedby="nombre"
                        placeholder="nombre">
                    </div>
                    <div class="mb-3 col-2 mt-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input 
                        type="text" 
                        name="apellido" 
                        class="form-control" 
                        id="apellido"
                        placeholder="apellido">
                    </div>
                    <div class="mb-3 col-2 mt-3">
                        <label for="mail" class="form-label">Mail</label>
                        <input 
                        type="mail" 
                        name="mail" 
                        class="form-control" 
                        id="mail"
                        placeholder="mail">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-2 mt-3">
                        <label for="puesto" class="form-label">Puesto</label>
                        <select name="puesto" id="puesto"class="form-select" aria-label="Default select example">
                            <option value="" selected>puesto</option>
                            <?php 
                                require '../assets/config.php';
                                $sql = "SELECT id, puesto FROM propuesta";
                                $query = $con->query($sql);
                                while($resultado = $query->fetch_assoc())
                                {
                                echo  "<option value='".$resultado['id']."'>". $resultado['puesto']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 col-2 mt-3">
                        <label for="salary" class="form-label">Salario pretendido</label>
                        <input 
                        type="number" 
                        name="salary" 
                        class="form-control" 
                        id="salary" 
                        min="0"
                        placeholder="salario">
                    </div>
                    <div class="mb-3 col-2 mt-3">
                    <label for="curriculum" class="form-label archivos">Cargá tu CV</label>
                        <input type="file" name="archi" id="archi" class="form-control">
                    </div>
                    <div class="mb-3 col-2 mt-3">
                        <label for="Entrevistador" class="form-label"></label>
                        <input type="hidden" name="entrevistador" class="form-control" id="Entrevistador" value="1" min="1" max="1">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                <div class="alert alert-info alert-dismissible fade show col-3 alertaIns" role="alert" style="float: right;">
                    <strong>
                        <span class="tituloAlert">
                        </span>
                    </strong> 
                    <span class="descAlert">
                    </span> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </form>
  </div>
  <?php require "./layouts/footCandidatos.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/candidatos.js"></script>

</body>
</html>
