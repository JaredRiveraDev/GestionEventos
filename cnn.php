<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$dbname = 'arquitecturabd';
$username = 'root';
$password = '';

// Crear una instancia de PDO
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  // Configurar el modo de error para generar excepciones en lugar de advertencias
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Establecer el conjunto de caracteres
  $pdo->exec('SET NAMES utf8');
} catch (PDOException $e) {
  echo "Error al conectarse a la base de datos: " . $e->getMessage();
  die();
}
?>
