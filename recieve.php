<?php

$strTmpName = $_FILES['file']['tmp_name'];

$strHash = $_POST['hash'];


$strSecret = 'test_secret_key';


$mixFileData = file_get_contents($strTmpName);

$strComputedHash = hash_hmac('sha256', $mixFileData, $strSecret);


if ($strComputedHash === $strHash) {
    echo 'yay';
} else {
    echo 'fail';
}
?>
