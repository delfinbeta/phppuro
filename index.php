<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="d-flex align-items-center py-4" style="height: 100vh;">
    <main class="m-auto p-4 text-white bg-primary bg-gradient rounded-4" style="width: 320px;">
        <h1>Iniciar Sesión</h1>

        <form action="controllers/login.php" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">Usuario:</label>
                <input type="text" id="username" name="username" class="form-control <?php if (isset($_SESSION['errors']['username'])) { echo 'is-invalid'; } ?>" aria-describedby="error_username" required />
                <div id="error_username" class="invalid-feedback">
                    <?php
                        if (isset($_SESSION['errors']['username'])) { echo $_SESSION['errors']['username']; }
                        else { echo 'Nombre de Usuario es Obligatorio'; }
                    ?>
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
                <button type="submit" class="btn btn-dark">Entrar</button>
            </div>
            <div class="text-center">
                <a href="registro.php" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">
                    Registro
                </a>
            </div>
        </form>
    </main>

    <?php unset($_SESSION['errors']); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <script>
        (() => {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>