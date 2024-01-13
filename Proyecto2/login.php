<?php
session_start();
$contraseña = "C0ntr@seña76";
$usuario = "id20813203_dtbs";
$nombreBaseDeDatos = "id20813203_user";
$rutaServidor = "localhost";

$conexion = mysqli_connect($rutaServidor, $usuario, $contraseña, $nombreBaseDeDatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.html');
        exit;
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h1>Iniciar sesión</h1></div>
                    <div class="card-body">
                        <?php if (isset($error)) : ?>
                            <p><?php echo $error ?></p>
                        <?php endif; ?>
                        <form method="post" action="login.php">
                            <div class="form-group">
                                <label for="usuario">Nombre de usuario:</label>
                                <input type="text" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Contraseña:</label>
                                <input type="password" name="contraseña" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="btn btn-primary btn-block">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
