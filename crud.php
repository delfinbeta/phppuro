<?php
require_once 'models/User.php';

/*
 * Crear Tabla de Usuarios
 * CREATE TABLE `phppuro`.`users` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `firstname` VARCHAR(255) NOT NULL,
        `lastname` VARCHAR(255) NOT NULL,
        `username` VARCHAR(255) NOT NULL,
        `password` VARCHAR(60) NOT NULL,
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE
    );
    rodrigoavalosgzz@gmail.com
 */

echo 'Hola PHP Puro<br/>';

$hash = password_hash("dayan123", PASSWORD_BCRYPT);
$hash = password_hash("rodrigo123", PASSWORD_BCRYPT);

echo '<br/>';
echo 'HASH de dayan123: ' . $hash . '<br/>';

// echo '<br/>';
// echo 'Verificar password dayancita: ';

// if (password_verify('dayancita', $hash)) {
//     echo 'Password valido :)<br/>';
// } else {
//     echo 'Password invalido.<br/>';
// }

// echo '<br/>';
// echo 'Verificar password dayan123: ';

// if (password_verify('dayan123', $hash)) {
//     echo 'Password valido :)<br/>';
// } else {
//     echo 'Password invalido.<br/>';
// }

// $my_user = new User;
// $my_user->create('Dayan', 'Betancourt', 'delfinbeta', 'dayan123');
// $my_user->create('Ricardo', 'Garrido', 'ryck23', 'ryck123');
// $my_user->create('Oscar', 'Ruiz', 'oscar23', 'oscar123');
// $my_user->create('Juana', 'Betancourt', 'jojojo', 'juan123');

// echo 'Usuarios creados';

// $users = $my_user->getAll();

// echo 'Listado de Usuarios<br/>';

// foreach ($users as $user) {
//     echo $user->id . ' | ' . $user->firstname . ' | ' . $user->lastname . ' | ' . $user->username . '<br/>';
// }

// echo '<br/>';
// echo 'Usuario con ID = 2<br/>';

// $user = $my_user->getById(2);

// echo $user->id . ' | ' . $user->firstname . ' | ' . $user->lastname . ' | ' . $user->username . '<br/>';

// echo '<br/>';
// echo 'Usuario con Username = delfinbeta<br/>';

// $user = $my_user->getByUsername('delfinbeta');

// echo $user->id . ' | ' . $user->firstname . ' | ' . $user->lastname . ' | ' . $user->username . '<br/>';

// echo '<br/>';
// echo 'Modificar Usuario con ID = 4 con Nombre = Juan y Username = juanito<br/>';

// $my_user->update(4, 'Juan', 'Betancourt', 'juanito');

// echo '<br/>';
// echo 'Usuario con ID = 4<br/>';

// $user = $my_user->getById(4);

// echo $user->id . ' | ' . $user->firstname . ' | ' . $user->lastname . ' | ' . $user->username . '<br/>';

// echo '<br/>';
// echo 'Borrar Usuario con ID = 4<br/>';

// $my_user->delete(4);
?>