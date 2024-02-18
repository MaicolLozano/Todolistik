<?php
require_once 'config.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Verificar si se ha proporcionado un ID de tarea válido
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Obtener la información de la tarea
    $query = "SELECT * FROM tasks WHERE id = '$task_id' AND user_id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $task = mysqli_fetch_assoc($result);

    // Procesar el formulario de edición de tarea
    if (isset($_POST['edit_task'])) {
        $edited_task = $_POST['task'];
        $edited_description = $_POST['description'];

        $query = "UPDATE tasks SET title = '$edited_task', description = '$edited_description' WHERE id = '$task_id' AND user_id = '$user_id'";
        mysqli_query($conn, $query);

        header('Location: ../index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $task['title']; ?></title>

                <!-- Required meta tags -->
                <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

    <!-- ... -->
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
        <h2>Editar tarea</h2>

        <form method="POST" action="edit_task.php?id=<?php echo $task_id; ?>">
            <div class="form-group">
                <label for="task">Tarea:</label>
                <input type="text" class="form-control" id="task" name="task" value="<?php echo $task['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo $task['description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="edit_task">Guardar cambios</button>
        </form>

       <a class="mt-3" href="../index.php">Volver al tablero</a>
    </div>

    <!-- ... -->
</body>
</html>