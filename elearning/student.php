<?php
session_start();
$erreur = ""; 
if(isset($_POST["submit"])) {
    if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
       
        $username = $_POST["username"];
        $password = $_POST["password"];

        
        require "server.php";
        $getdate = $pdo->prepare("SELECT email FROM admin WHERE email=? AND password=?");
        $getdate->execute(array($username, $password));
        $rows = $getdate->rowCount();

        if($rows == 1) {
            
            $_SESSION["student"] = $username;
            header("location:dashbord.php"); 
            exit(); 
        } else {
            $erreur = "Username or password incorrect";
        }
    } else {
        $erreur = "Please enter a username and password";
    }
}
?>