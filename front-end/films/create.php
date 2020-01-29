<?php

$title = "CREATE";
include __DIR__ . "/../layout/default.php";

?>
<div class="container" align="center" style="margin-top: 20px">
<form action="create" method="POST">
    <ul style="list-style-type: none;">
        <li><label>Название: <input type="text" name="name" ></label></li>
        <li><label>Автор: <input type="text" name="director" ></label></li>
        <li><label>Актеры: <input type="text" name="actors" ></label></li>
        <li><label>Бюджет: <input type="text" name="budget" ></label></li>
    </ul>
    <button class="btn btn-success" type="submit" name="Submit">Save info</button>
</form>
<p><a class="btn btn-primary" href="/films/">Назад</a></p>
</div>