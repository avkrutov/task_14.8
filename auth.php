<?php session_start(); ?>
<?php
// функция проверки существует ли пользователь
function checkLog(string $login, string $password): bool {
    $users = require 'arraydb.php';
    foreach ($users as $user) {
        if ($user['login'] === $login
        && $user['password'] === $password) {
            return true;
        }
    }
    return false;
}
// функция проверки логина и пароля
function getUserLogin(): ?string {
    $loginFromSession = $_SESSION['login'] ?? '';
    $passwordFromSession = $_SESSION['password'] ?? '';
    if(checkLog($loginFromSession, $passwordFromSession)) {
        return $loginFromSession;
    }
    return null;
}

?>