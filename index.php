<?php
require_once 'php/config.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: php/login.php');
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

<?php include 'navbar/navbar.php'; ?>
 <style>

.container {
  width: 90%;
  max-width: 800px;
  margin: 0 auto;

}

h2, h3 {
  color: #3F51B5;
  font-size: 24px; /* Ajusta el tamaño de la letra de los encabezados h2 y h3 a 24px */
}

.card-deck {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.card {
  flex: 0 1 calc(50% - 10px);
  margin-bottom: 20px;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: all 0.3s ease-in-out; /* Agrega una transición suave a todas las propiedades */
}

.card:hover {
  transform: scale(1.05); /* Aumenta el tamaño de la tarjeta cuando se pasa el mouse por encima */
  box-shadow: 0 5px 15px rgba(0,0,0,0.2); /* Aumenta la sombra cuando se pasa el mouse por encima */
}

.card-body {
  padding: 20px;
}

.card-title {
  margin-bottom: 15px;
  color: #3F51B5;
}

.btn {
  color: #fff;
  border: none;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 15px;
  transition: background 0.3s ease-in-out; /* Agrega una transición suave al fondo */
}

.btn-primary {
  background: #3F51B5;
}

.btn-primary:hover {
  background: #283593; /* Cambia el color de fondo cuando se pasa el mouse por encima */
}

.btn-danger {
  background: #f44336;
}

.btn-danger:hover {
  background: #c62828; /* Cambia el color de fondo cuando se pasa el mouse por encima */
}

.card-title {
    font-size: 20px; /* Ajusta el tamaño de la letra del título de la tarjeta a 20px */
}

.card-text {
    font-size: 16px; /* Ajusta el tamaño de la letra del texto de la tarjeta a 16px */
}


@media (max-width: 768px) {
  .card-deck {
      flex-direction: column;
  }

  .card {
      flex: 0 1 100%;
  }
}



 </style>
 <link rel="stylesheet" href="css/style.css">
<body>
<div class="container mt-4">
        <h2>¡Welcome, <?php echo $user['name']; ?>!</h2>
        <h3>Your Todolist:</h3>

        <div class="card-deck col-md-10 ">
        <?php foreach ($tasks as $task) : ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $task['title']; ?></h5>
                        <p class="card-text"><?php echo $task['description']; ?></p> <br><br>
                        <a href="php/edit_task.php?id=<?php echo $task['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="php/delete_task.php?id=<?php echo $task['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div> <br>
            <?php endforeach; ?>
        </div>

        <div class="mt-4">
            <a href="php/add_task.php" class="btn btn-primary">Add Task</a>
        </div>
    </div>
    <?php include 'navbar/footer.php'; ?> 
