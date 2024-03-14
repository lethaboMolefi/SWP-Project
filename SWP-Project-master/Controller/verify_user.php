<?php
session_start();
require '../Database/db_config.php';
require '../Model/verify_user.php'; // Ensure this file returns $pdo

// Instantiate the UserAuthenticator with the PDO object
$authenticator = new UserAuthenticator($link);

// Assuming you're getting data from a form
$username = $_POST['username'];
$password = $_POST['password'];

// Verify credentials
$user = $authenticator->verifyCredentials($username, $password);

if($user){
    $authenticator->initUserSession($user);
}else{
    $error_message ="User not found. Please Click the sign up link below.";
    $_SESSION["error-message"]=$error_message;
    header("Location: ../index.php");
}

// include '../index.php';
?>
