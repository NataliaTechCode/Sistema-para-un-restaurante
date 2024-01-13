<?php
$contraseña = "C0ntr@seña76";
$usuario = "id20813203_dtbs";
$nombreBaseDeDatos = "id20813203_user";
$rutaServidor = "localhost";

try {
    $base_de_datos = new PDO("mysql:host=$rutaServidor;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Ocurrió un error con la base de datos: " . $e->getMessage());
}

if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
    $buscar = htmlspecialchars($buscar, ENT_QUOTES, 'UTF-8');

    $query = $base_de_datos->prepare("SELECT * FROM categoria WHERE nombre LIKE :buscar");
    $query->execute(array(':buscar' => '%' . $buscar . '%'));
} else {
    $query = $base_de_datos->query("SELECT * FROM categoria");
}

$categoria = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
<head>
<title>Apptizire</title>
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
        <!-- Formulario para hacer la busqueda del categoria -->
        <p>Buscar Categoria:</p>
            <form method="get">
                <input type="text" name="buscar">
                <button type="submit" value="BUSCAR" class="btn btn-success"><span class="glyphicon glyphicon-zoom-in"></span></button>
            </form>
      </a></li>
     
    </ul>
  </div>
</nav>
    <div class="container">
        <h1>Registro de Categorias</h1> 

        <!-- Tabla para mostrar los categorias -->

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>categoria</th>
                    <th>Editar</th>
                    <th>Modificar</th>                  
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoria as $categoria) : ?>
                    <tr>
                        <td><?php echo $categoria['nombre'] ?></td>
                        <td><a href="editarCt.php?idcategoria=<?php echo $categoria['idcategoria'] ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td><a href="eliminarCt.php?idcategoria=<?php echo $categoria['idcategoria'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
         <a href="añadirCt.php" class="btn btn-primary">Añadir</a>
    </div>
</body>
</html>
