<?php
require_once 'config.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Procesar el formulario para agregar una tarea
if (isset($_POST['add_task'])) {
    $task = $_POST['task'];
    $description = $_POST['description'];

    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO tasks (user_id, title, description) VALUES ('$user_id', '$task', '$description')"; // Modificación
    mysqli_query($conn, $query);

    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar tarea</title>

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
        <h2 class="mt-4">Agregar tarea</h2>

        <form method="POST" action="">
            <div class="form-group">
                <label for="task">Tarea:</label>
                <input type="text" class="form-control" id="task" name="task" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="3">
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="add_task">Agregar tarea</button>
        </form>

        <a href="../index.php">Volver al tablero</a>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>