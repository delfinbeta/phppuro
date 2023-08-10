<?php
session_start();

require_once '../../models/User.php';

$id = $_GET['id'];

if (!isset($id)) {
    header('Location: index.php');
}

$my_user = new User;
$my_user->delete($id);

header('Location: ../../usuarios/index.php');
exit();