<?php
require "../../database/database.php";
require "../../models/user.model.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $encryptPassword = password_hash($password, PASSWORD_BCRYPT);
    

    $user = accountExist($email);
    if(count($user) == 0){
        createAccount($name, $email, $encryptPassword);
        header('Location: /signin');

        $_SESSION['success'] = "Account successfully created";
    }else{
        echo "Account already exists";
    }

 }