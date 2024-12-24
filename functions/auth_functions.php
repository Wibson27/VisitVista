<?php
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        header('Location: register.php?tab=login');
        exit;
    }
}