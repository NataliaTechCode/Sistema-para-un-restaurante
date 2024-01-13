<?php
$contraseña = "C0ntr@seña76";
$usuario = "id20813203_dtbs";
$nombreBaseDeDatos = "id20813203_user";
$rutaServidor = "localhost";

try {
    $db = new PDO("mysql:host=$rutaServidor;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

if (isset($_GET['idcategoria'])) {
    $idcategoria = $_GET['idcategoria'];
    $stmt = $db->prepare("DELETE FROM categoria WHERE idcategoria=:idcategoria");
    $stmt->bindParam(":idcategoria", $idcategoria);
    $stmt->execute();
    header("Location: tcategoria.php");
}

$db = null;
?>
