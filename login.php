
<!DOCTYPE html>
<html lang="ru">

<meta charset="utf-8">
<title>Авторизация</title>
<style type="text/css">
    
body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    color: #000;
    background-color: #f8f8f8;
}

* {
    box-sizing: border-box;
}

.form {
    max-width: 320px;
    padding: 15px;
    margin: 20px auto;
    background-color: #fff;
}

.input, .textbox-n {
    display: block;
    width: 100%;
    padding: 8px 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    font-family: inherit;
    font-size: 16px;
}

.btn {
    display: block;
    width: 100%;
    padding: 8px 10px;
    border: 0;
    background-color: #2DA11C;
    cursor: pointer;
    font-family: inherit;
    font-size: 16px;
    color: #fff;
}

.btn:hover {
    background-color: #0d6107;
}

#err {
    display: flex;
    justify-content: space-around;
}
</style>

<?php
// авторизация 
if (!empty($_POST)) {
    require 'arraydb.php';
    require 'auth.php';
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    if (checkLog($login, $password)) {
        session_start ();
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $users['login'];  
        header('Location: index.php');
    } else {
        $error = 'Ошибка авторизации';
    }
}
?>

<?php if (isset($error)): ?>
<span style="color: red;"  id="err">
    <?= $error ?>
</span>
<?php endif; ?>
<body>
    <form class="form" action="" method="post"> 
        <input class="input" type="text" placeholder="Ваше имя" name="login">
        <input class="input" type="password" placeholder="Пароль" name="password">
        <button class="btn" type="submit">Авторизация</button>
    </form>
</body>


