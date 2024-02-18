<?php
require_once 'config.php';
session_start();
// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

// Procesar el formulario de registro
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar los datos del formulario
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = 'Por favor, complete todos los campos.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Ingrese una dirección de correo electrónico válida.';
    } elseif ($password !== $confirm_password) {
        $error_message = 'Las contraseñas no coinciden.';
    } else {
        // Validar la contraseña segura
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $error_message = 'La contraseña debe contener al menos 8 caracteres, incluyendo letras mayúsculas, minúsculas, números y caracteres especiales.';
        }

        // Filtrar palabras no permitidas
        $forbiddenWords = array('contraseña', 'admin', '123456', 'root'); // Agrega tus propias palabras no permitidas

        foreach ($forbiddenWords as $word) {
            if (stripos($name, $word) !== false || stripos($password, $word) !== false) {
                $error_message = 'El nombre de usuario o la contraseña contienen palabras no permitidas.';
                break;
            }
        }

        if (!isset($error_message)) {
            // Verificar si el correo electrónico ya está registrado
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $error_message = 'El correo electrónico ya está registrado.';
            } else {
                // Hash de la contraseña
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insertar el nuevo usuario en la base de datos
                $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
                mysqli_query($conn, $query);

                // Redirigir al usuario a la página de inicio de sesión
                header('Location: login.php');
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
                <!-- Required meta tags -->
                <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_2.css">
    <!-- Link a la fuente Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
  
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Registro</h2>

        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger mt-4"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar contraseña:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Registrarse</button>
            <!-- <a href="login.php" class="btn btn-primary" role="button">Iniciar session</a> -->
            

        </form>
        <p class="mt-3">Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>