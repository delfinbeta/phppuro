<?php
require_once '../session.php';
require_once '../admin.php';
require_once '../models/User.php';

$my_user = new User;
$users = $my_user->getAll();
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
                <h1>Usuarios</h1>
                <table class="table table-primary table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th class="text-center" style="width: 140px;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                        <tr>
                            <td class="text-center">
                                <a href="usuario.php?id=<?php echo $user->id ?>" class="btn btn-primary"><?php echo $user->id ?></a>
                            </td>
                            <td><?php echo $user->firstname ?></td>
                            <td><?php echo $user->lastname ?></td>
                            <td><?php echo $user->username ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?php echo $user->id ?>" class="btn btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="../controllers/users/delete.php?id=<?php echo $user->id ?>" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>