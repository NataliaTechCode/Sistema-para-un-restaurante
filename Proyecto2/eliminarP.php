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

if (isset($_GET['idproducto'])) {
    $idproducto = $_GET['idproducto'];
    $stmt = $db->prepare("DELETE FROM producto WHERE idproducto=:idproducto");
    $stmt->bindParam(":idproducto", $idproducto);
    $stmt->execute();
    header("Location: tproducto.php");
}

$db = null;
?>
