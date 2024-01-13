<?php
$contraseña = "C0ntr@seña76";
$usuario = "id20813203_dtbs";
$nombreBaseDeDatos = "id20813203_user";
$rutaServidor = "localhost";

$conexion = new mysqli($rutaServidor, $usuario, $contraseña, $nombreBaseDeDatos);

if ($conexion->connect_error) {
    die("HUBO UN ERROR DE CONEXIÓN: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO producto(nombre, precio,categoria) VALUES ('$nombre', '$precio','$categoria')";
    $resultado = $conexion->query($sql);

    if (!$resultado) {
        die("HUBO UN ERROR DE CONEXIÓN: " . $conexion->error);
    }

    header("Location: tproducto.php");
}

$conexion->close();
?>

<html>
<head>
    <title>Añadir Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    <body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">Apptizire</a>
    </div>
    <ul class="nav navbar-nav">
          <li><a href="tproducto.php">Producto</a></li>
          <li><a href="tcliente.php">Clientes</a></li>
          <li><a href="tcategoria.php">Categoría</a></li>
         
    </ul>
  </div>
</nav>
  
        <form method="post" action="añadirP.php">
            <h1>Añadir Producto</h1>
            <label for="nombre">Producto:</label>
            <input type="text" name="nombre" required>
            <br><br>
            <label for="precio">precio:</label>
            <input type="number" name="precio" step="0.01" required>
            <br><br>
            <label for="categoria">Categoría:</label>
            <input type="text" name="categoria" required>
            <br><br>
            <input class="btn btn-success" type="submit" value="AGREGAR">
        </form>
    </body>
</html>
