<?php
 require_once 'cnn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GestionEventos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!-- Mixins-->
    <!-- Pen Title-->
    <div class="pen-title">
        <h1>Crear Cita</h1>
    </div>
    <div class="container">
        <div class="card"></div>
        <div class="card">
            <h1 class="title">Nueva Cita</h1>
            <form method="POST" action="AddCitas.php">
                <div class="input-container">
                    <input type="date" id="#{label}" name="fecha" required="required" />
                    <!-- <label for="#{label}">fecha</label> -->
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="#{label}" id="#{label}" name="descripcion" required="required" />
                    <label for="#{label}">Descripcion</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <?php

                    $sql = 'SELECT id, nombreServicio, descripcion FROM servicios';

                    $statement = $pdo->prepare($sql);
                    $statement->execute();

                    $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

                    ?>

                    <select name="opciones" class="form-select" aria-label="Default select example" >
                        <?php foreach ($resultado as $fila): ?>
                            <option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombreServicio']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <label for="#{label}">Servicio</label> -->
                    <div class="bar"></div>
                </div>

                <div class="button-container">
                    <button type="submit" name="registrar"><span>Go</span></button>
                </div>
                <!-- <div class="footer"><a href="#">Forgot your password?</a></div> -->
            </form method="POST" action="AddCitas.php">
        </div>
    </div>

    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="./script.js"></script>

</body>
<?php
     

if (isset($_POST['registrar'])) 
{
    
  $fecha=$_POST['fecha'];
  $descripcion=$_POST['descripcion'];
  $nombreServicio=$_POST['nombreServicio'];
  
  
  if (!empty($fecha) && !empty($descripcion) && !empty($nombreServicio))
  {

    $sql=$pdo->prepare("INSERT INTO citas (fecha, descripcionCita, idServicio) VALUES (:fecha, :descripcion, :nombreServicio)");

        
    $sql->bindParam(':fecha',$fecha);
    $sql->bindParam(':descripcion',$descripcion);
    $sql->bindParam(':nombreServicio',$nombreServicio);

        
    $sql->execute();
    unset($sql);
 }
  
}
?>
</html>