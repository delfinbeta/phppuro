<?php
session_start();

require_once '../models/User.php';

$username = $_POST['username'];
$password = $_POST['password'];

$error = false;

if (!isset($username) || (strlen($username) < 6)) {
    $error = true;
    $_SESSION['errors']['username'] = 'Nombre de Usuario es Obligatorio';
}

if (!isset($password) || (strlen($password) < 6)) {
    $error = true;
    $_SESSION['errors']['password'] = 'Contraseña es Obligatoria';
}

if ($error) {
    header('Location: ../index.php');
} else {
    $my_user = new User;
    $user = $my_user->getByUsername($username);

    if ($user) {
        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = $user;
            header('Location: ../dashboard.php');
        } else {
            $_SESSION['errors']['username'] = 'Datos Incorrectos';
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['errors']['username'] = 'Datos Incorrectos';
        header('Location: ../index.php');
    }
}

exit();