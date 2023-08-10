<?php
session_start();

require_once '../models/User.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];

$error = false;

if (!isset($firstname) || (strlen($firstname) < 3)) {
    $error = true;
    $_SESSION['errors']['firstname'] = 'Nombre es Obligatorio';
}

if (!isset($lastname) || (strlen($lastname) < 3)) {
    $error = true;
    $_SESSION['errors']['lastname'] = 'Apellido es Obligatorio';
}

if (!isset($username) || (strlen($username) < 6)) {
    $error = true;
    $_SESSION['errors']['username'] = 'Nombre de Usuario es Obligatorio';
}

if (!isset($password) || (strlen($password) < 6)) {
    $error = true;
    $_SESSION['errors']['password'] = 'Contraseña es Obligatoria';
}

if ($error) {
    header('Location: ../registro.php');
} else {
    $my_user = new User;
    $my_user->create($firstname, $lastname, $username, $password,);
    $user = $my_user->getByUsername($username);

    $_SESSION['user'] = $user;
    header('Location: ../dashboard.php');
}

exit();