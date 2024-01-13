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

    $sql = "INSERT INTO categoria(nombre) VALUES ('$nombre')";
    $resultado = $conexion->query($sql);

    if (!$resultado) {
        die("HUBO UN ERROR DE CONEXIÓN: " . $conexion->error);
    }

    header("Location: tcategoria.php");
}

$conexion->close();
?>

<html>
<head>
    <title>Añadir categoria</title>
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
  
        <form method="post" action="añadirCt.php">
            <h1>Añadir categoria</h1>
            <label for="nombre">Nombre categoria:</label>
            <input type="text" name="nombre" required>           
            <input class="btn btn-success" type="submit" value="AGREGAR">
        </form>
    </body>
</html>
