<?php

$title = "LOGIN";
include __DIR__ . "/../layout/auth.php";

?>
<div class="container" align="center"style="margin-top: 20px">
<form action="login" method="POST">
<ul style="list-style-type: none;">
    <li><label>Login :<input type="text" name="login" ></label></li>
    <li><label>Pass<input type="password" name="password" ></label></li>
</ul>
    <button class="btn btn-success" type="Login" name="Login">Войти</button>
</form>
<a type="button" class="btn btn-primary" href="/auth/register">Нет акаунта? Создай!</a>
<a type="button" class="btn btn-primary" href="/">На главную</a>
</div>