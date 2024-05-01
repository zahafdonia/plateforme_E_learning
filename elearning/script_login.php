<?php
session_start();
$erreur = ""; 
if(isset($_POST["submit"])) {
    if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
       
        $username = $_POST["username"];
        $password = $_POST["password"];

        require "server.php";

        // Vérifier le rôle de l'utilisateur
        $stmt = $pdo->prepare("SELECT role FROM user WHERE (username=? OR email=?) AND password=?");
        $stmt->execute(array($username, $username, $password)); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            // Rediriger en fonction du rôle de l'utilisateur
            switch($user['role']) {
                case 'admin':
                    $_SESSION["admin"] = $username;
                    header("location: dashbord.php"); 
                    exit(); 
                    break;
                case 'student':
                    $_SESSION["student"] = $username;
                    header("location: student_dashboard.php"); 
                    exit(); 
                    break;
                case 'enseignant':
                    $_SESSION["teacher"] = $username;
                    header("location: teacher_dashboard.php"); 
                    exit(); 
                    break;
                case 'formateur':
                    $_SESSION["former"] = $username;
                    header("location: former_dashboard.php"); 
                    exit(); 
                    break;
                default:
                    $erreur = "Rôle non reconnu";
                    break;
            }
        } else {
            $erreur = "Nom d'utilisateur ou mot de passe incorrect";
        }
    } else {
        $erreur = "Veuillez saisir un nom d'utilisateur et un mot de passe";
    }
}
?>


