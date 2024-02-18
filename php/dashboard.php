<?php
require_once 'config.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}




// Obtener los detalles del usuario desde la base de datos
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);









// Obtener las tareas del usuario actual
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM tasks WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

$tasks = array();
while ($row = mysqli_fetch_assoc($result)) {
    $tasks[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tablero de tareas</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container">
        <h2 class="mt-4">¡Bienvenido, <?php echo $user['name']; ?>!</h2>

        <h3 class="mt-4">Tu Todolist:</h3>
</div>
    <div class="container">
        <h2 class="mt-4">Tablero de tareas</h2>

        <a href="add_task.php" class="btn btn-primary mb-3">Agregar tarea</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tarea</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) : ?>
                    <tr>
                        <td><?php echo $task['id']; ?></td>
                        <td><?php echo $task['title']; ?></td>
                        <td>
                            <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                            <a href="delete_task.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="logout.php">Cerrar sesión</a>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>