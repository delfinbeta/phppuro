<?php
session_start();

require_once '../../models/User.php';

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];

if (!isset($_POST['admin'])) {
    $admin = 0;
} else {
    $admin = $_POST['admin'];
}


$error = false;

if (!isset($firstname) || (strlen($firstname) < 3)) {
    $error = true;
    $_SESSION['errors']['firstname'] = 'Nombre es Obligatorio';
}

if (!isset($lastname) || (strlen($lastname) < 3)) {
    $error = true;
    $_SESSION['errors']['lastname'] = 'Apellido es Obligatorio';
}

if (!isset($username) || (strlen($username) < 3)) {
    $error = true;
    $_SESSION['errors']['username'] = 'Nombre de Usuario es Obligatorio';
}

if (!isset($password) || (strlen($password) < 3)) {
    $error = true;
    $_SESSION['errors']['password'] = 'Contraseña es Obligatoria';
}

if ($error) {
    header('Location: ../../usuarios/edit.php');
} else {
    $my_user = new User;
    $my_user->update($id, $firstname, $lastname, $username, $admin, $password);
    header('Location: ../../usuarios/index.php');
}

exit();