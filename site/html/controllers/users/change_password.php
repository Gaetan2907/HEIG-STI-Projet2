<?php
include "../../../databases/db_connection.php";

session_start();
include "../../scripts/check_authentication.php";
include "../../scripts/password.php";

if ($_POST["csrf_token"] != $_SESSION["csrf_token"]) {
    // Reset token
    unset($_SESSION["csrf_token"]);
    die("validation token CSRF token échouée");
}

// Check if the new password was sent
if( !isset($_POST['password']) || !checkPassword($_POST['password'])){
    header('Location: /views/users/change_password.php');
    die();
}

// Update the password associated with user
$sql = $file_db->prepare("UPDATE users SET `password` = ? WHERE `username` = ?");
$sql->execute([hash_password($_POST['password']), $_SESSION['user']]);

header('Location: /views/users/change_password.php');
die();


?>
