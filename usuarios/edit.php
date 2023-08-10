<?php
require_once '../session.php';
require_once '../admin.php';
require_once '../models/User.php';

$id = $_GET['id'];

if (!isset($id)) {
    header('Location: index.php');
    exit();
}

$my_user = new User;
$user = $my_user->getById($id);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <main class="container">
        <div class="d-md-flex row" style="min-height: 100vh;">
            <div class="col-md-2 p-3 bg-primary text-white">
                <?php include('../menu.php'); ?>
            </div>
            <div class="col-md-9 p-3 bg-light">
                <h1>Usuario</h1>
                <form action="../controllers/users/update.php" method="POST" class="needs-validation m-auto" novalidate style="width: 70%;">
                    <input type="hidden" id="id" name="id" value="<?php echo $user->id ?>" />
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Nombre:</label>
                        <input type="text" id="firstname" name="firstname" value="<?php echo $user->firstname ?>" class="form-control <?php if (isset($_SESSION['errors']['firstname'])) { echo 'is-invalid'; } ?>" aria-describedby="error_firstname" required />
                        <div id="error_firstname" class="invalid-feedback">
                            <?php
                                if (isset($_SESSION['errors']['firstname'])) { echo $_SESSION['errors']['firstname']; }
                                else { echo 'Nombre es Obligatorio'; }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido:</label>
                        <input type="text" id="lastname" name="lastname" value="<?php echo $user->lastname ?>" class="form-control <?php if (isset($_SESSION['errors']['lastname'])) { echo 'is-invalid'; } ?>" aria-describedby="error_lastname" required />
                        <div id="error_lastname" class="invalid-feedback">
                            <?php
                                if (isset($_SESSION['errors']['lastname'])) { echo $_SESSION['errors']['lastname']; }
                                else { echo 'Apellido es Obligatorio'; }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario:</label>
                        <input type="text" id="username" name="username" value="<?php echo $user->username ?>" class="form-control <?php if (isset($_SESSION['errors']['username'])) { echo 'is-invalid'; } ?>" aria-describedby="error_username" required />
                        <div id="error_username" class="invalid-feedback">
                            <?php
                                if (isset($_SESSION['errors']['username'])) { echo $_SESSION['errors']['username']; }
                                else { echo 'Nombre de Usuario es Obligatorio'; }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="admin" name="admin" <?php if ($user->admin) { echo 'checked'; } ?> />
                        <label class="form-check-label" for="admin">Admin</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" id="password" name="password" class="form-control <?php if (isset($_SESSION['errors']['password'])) { echo 'is-invalid'; } ?>" aria-describedby="error_password" required />
                        <div id="error_password" class="invalid-feedback">
                            <?php
                                if (isset($_SESSION['errors']['password'])) { echo $_SESSION['errors']['password']; }
                                else { echo 'Contraseña es Obligatoria'; }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>