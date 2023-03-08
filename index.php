<?php
ob_start();
session_start();
 require_once 'cnn.php';
?>

<?php
//metodo para validar los usuarios del login

if (isset($_POST['enviar'])){

  $nombreUsuario=$_POST['nombreUsuario'];
  $password=$_POST['password'];


  $sql=$pdo->prepare('SELECT * from usuarios WHERE nombreUsuario=:nombreUsuario AND password=:password');
  $sql->bindParam(':nombreUsuario',$nombreUsuario);
  $sql->bindParam(':password',$password);

  $sql->execute();
  $count = $sql->rowCount();

  if ($count)
  {
    $_SESSION['nombreUsuario']=$dato_encriptado;
    
    echo"<script>window.location='welcome.php'</script>";
  }
  if (!$count)
  {
    echo"<center><h2>Usuario o contraseña incorrecta</h2> <br> <a href='index.html'>Regresar</a></center>";
  }
}

?>


<?php
     

if (isset($_POST['registrar'])) 
{
    
  $nombreUsuario=$_POST['nombreUsuario'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $telefono=$_POST['telefono'];
  $direccion=$_POST['direccion'];
  $nombre=$_POST['nombre'];
  $apellido=$_POST['apellido'];
  
  if (!empty($nombreUsuario) && !empty($password) && !empty($email) && !empty($telefono) && !empty($direccion) && !empty($nombre) && !empty($apellido))
  {

    $sql=$pdo->prepare("INSERT INTO usuarios (nombreUsuario, password, email, telefono, direccion, nombre, apellido) VALUES (:nombreUsuario, :password, :email, :telefono, :direccion, :nombre , :apellido)");

        
    $sql->bindParam(':nombreUsuario',$nombreUsuario);
    $sql->bindParam(':password',$password);
    $sql->bindParam(':email',$email);
    $sql->bindParam(':telefono',$telefono);
    $sql->bindParam(':direccion',$direccion);
    $sql->bindParam(':nombre',$nombre);
    $sql->bindParam(':apellido',$apellido);
        
    $sql->execute();
    unset($sql);
    header("location:index.html");
 }
  
}
?>

<?php
ob_end_flush();
?>