<html>

<head>
<title>Tienda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">Apptizire</a>
    </div>
    <ul class="nav navbar-nav">
                <li><a href="tproducto.php">Producto</a></li>
                <li><a href="tcliente.php">Clientes</a></li>
                <li><a href="tcategoria.php">Categoría</a></li>
        <!-- Formulario para hacer la busqueda del producto -->
        <p>Buscar Cliente:</p>
            <form method="get">
                <input type="text" name="buscar">
                <button type="submit" value="BUSCAR" class="btn btn-success"><span class="glyphicon glyphicon-zoom-in"></span></button>
            </form>
      </a></li>
     
    </ul>
  </div>
</nav>
<?php
$contraseña = "C0ntr@seña76";
$usuario = "id20813203_dtbs";
$nombreBaseDeDatos = "id20813203_user";
$rutaServidor = "localhost";

$conexion = new mysqli($rutaServidor, $usuario, $contraseña, $nombreBaseDeDatos);

if ($conexion->connect_error) {
    die("HUBO UN ERROR DE CONEXIÓN: " . $conexion->connect_error);
}

if (isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE Cliente SET nombre='$nombre', telefono=$telefono, direccion='$direccion' WHERE id_cliente=$id_cliente";

    $resultado = $conexion->query($sql);

    if (!$resultado) {
        die("HUBO UN ERROR DE CONEXIÓN: " . $conexion->error);
    }

    header("Location: tcliente.php");
    exit();
}

if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];

    $resultado = $conexion->query("SELECT * FROM Cliente WHERE id_cliente=$id_cliente");

    if (!$resultado) {
        die("HUBO UN ERROR DE CONEXIÓN: " . $conexion->error);
    }

    $row = $resultado->fetch_assoc();

    echo "<form method='post'>";
    echo "<input type='hidden' name='id_cliente' value='" . $row['id_cliente'] . "'>";
    echo "<p>MODIFICAR Cliente</p>";
    echo "<label for='nombre'>NOMBRE:</label>";
    echo "<input type='text' name='nombre' value='" . $row['nombre'] . "'><br><br>";
    echo "<label for='telefono'>telefono:</label>";
    echo "<input type='number' name='telefono' value='" . $row['telefono'] . "'><br><br>";
    echo "<label for='direccion'>direccion:</label>";
    echo "<input type='text' name='direccion' value='" . $row['direccion'] . "'><br><br>";
    echo "<input type='submit' value='GUARDAR'>";
    echo "</form>";
}

$conexion->close();
?>
<html>