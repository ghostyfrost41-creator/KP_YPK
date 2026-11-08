<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['login_admin']) || $_SESSION['login_admin'] !== true) {
    header('Location: ../login.php');
    exit;
}
