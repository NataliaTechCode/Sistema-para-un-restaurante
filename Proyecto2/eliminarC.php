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

if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];
    $stmt = $db->prepare("DELETE FROM Cliente WHERE id_cliente=:id_cliente");
    $stmt->bindParam(":id_cliente", $id_cliente);
    $stmt->execute();
    header("Location: tcliente.php");
}

$db = null;
?>
