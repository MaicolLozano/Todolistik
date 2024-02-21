<?php
require_once 'config.php';
session_start();
// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

// Procesar el formulario de inicio de sesión
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar los datos del formulario
    if (empty($email) || empty($password)) {
        $error_message = 'Por favor, ingrese su correo electrónico y contraseña.';
    } else {
        // Verificar las credenciales del usuario en la base de datos
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                // Iniciar sesión exitosamente
                $_SESSION['user_id'] = $user['id'];
                header('Location: dashboard.php');
                exit();
            } else {
                $error_message = 'Contraseña incorrecta.';
            }
        } else {
            $error_message = 'El correo electrónico no está registrado.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

            <!-- Required meta tags -->
            <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_2.css">
    <!-- Link to Poppins font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
  
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Login</h2>

        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger mt-4"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3 form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <!-- <a href="register.php" class="btn btn-primary" role="button">Register</a> -->
        </form>
        <p class="mt-3">Don't have an account? <a href="register.php">Sign Up</a></p>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>