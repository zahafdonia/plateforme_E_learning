<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION["admin"])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Vous pouvez ajouter d'autres fonctionnalités spécifiques à l'administrateur ici

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administrateur</title>
    <style>
        /* styles.css */

/* Styles généraux */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    color: #333;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    color: #0056b3;
}

/* Styles pour le header */
header {
    background-color: #007bff;
    padding: 20px;
    color: #fff;
    text-align: center;
    border-radius: 10px 10px 0 0;
}

nav ul {
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0 10px;
}

nav ul li a {
    color: #fff;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: #f0f0f0;
}

/* Styles pour le contenu */
section {
    padding: 20px;
}

/* Styles pour le footer */
footer {
    background-color: #007bff;
    padding: 10px 0;
    text-align: center;
    border-radius: 0 0 10px 10px;
}

footer a {
    color: #fff;
    font-weight: bold;
    transition: color 0.3s ease;
}

footer a:hover {
    color: #f0f0f0;
}
</style>

</head>
<body>
    <h1>Bienvenue dans le tableau de bord Administrateur</h1>
    <p>Bienvenue, <?php echo $_SESSION["admin"]; ?>!</p>

    <h2>Gestion des utilisateurs :</h2>
    <ul>
        <li><a href="gerer_admin.php">Gérer les administrateurs</a></li>
        <li><a href="gerer_etudiants.php">Gérer les étudiants</a></li>
        <li><a href="gerer_formateurs.php">Gérer les formateurs</a></li>
    </ul>

    <!-- Ajoutez ici d'autres fonctionnalités spécifiques à l'administrateur -->

    <a href="logout.php">Déconnexion</a> <!-- Ajoutez un lien pour déconnecter l'administrateur -->
</body>
</html>
