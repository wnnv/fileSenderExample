<?php

$strTmpName = $_FILES['file']['tmp_name']; // получаем временное имя файла

$strHash = $_POST['hash']; // получаем хэш из запроса


$strSecret = 'test_secret_key'; // ваш секретный ключ или токен


$mixFileData = file_get_contents($strTmpName); // читаем данные из файла

$strComputedHash = hash_hmac('sha256', $mixFileData, $strSecret); // вычисляем хэш полученных данных с помощью секретного ключа


if ($strComputedHash === $strHash) {

    // файл прошел проверку подлинности
    echo 'yay';
    // ваш код для обработки файла

} else {

    // файл не прошел проверку подлинности
    echo 'fail';

    // обработка ошибки
}

?>