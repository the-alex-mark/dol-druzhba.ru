<?php
if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['message']))
{
    $theme  = 'Поддержка сайта ДОЛ "Дружба"';
    $letter = 'Данные отправителя:'       . PHP_EOL
            . 'Имя: '   . $_POST['name']  . PHP_EOL
            . 'Почта: ' . $_POST['email'] . PHP_EOL
            . PHP_EOL
            . 'Сообщение:'                . PHP_EOL
            . $_POST['message'];

    echo (mail('support@j576709.myjino.ru', $theme, $letter))
        ? "successfully"
        : "error";
}
else { echo "error"; }