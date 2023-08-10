<?php
if (!$_SESSION['user']->admin) {
    header('Location: /phppuro/dashboard.php');
    exit();
}
?>