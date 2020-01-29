<?php

$title = "REG";
include __DIR__ . "/../layout/auth.php";

?>
<div class="container" align="center"style="margin-top: 20px">
    <form action="register" method="POST">
        <ul style="list-style-type: none;">
            <li><label>Login: <input type="text" name="login" ></label></li>
            <li><label>Pass: <input type="password" name="password" ></label></li>
        </ul>
        <button class="btn btn-success"  type="submit" name="Register">Register</button>
    </form>
    <a type="button" class="btn btn-primary" href="/auth/login">Есть акаунт? Заходи!</a>
    <a type="button" class="btn btn-success" href="/">На главную</a>
</div>
