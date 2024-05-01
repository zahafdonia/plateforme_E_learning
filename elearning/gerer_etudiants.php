<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION["admin"])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Connexion à la base de données
require "server.php";

// Message d'erreur initial
$erreur = "";

// Ajouter un étudiant
if (isset($_POST['ajouter'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $niveau = $_POST['niveau'];
    $classe = $_POST['classe'];

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {


        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        // Déplacer l'image téléchargée vers le répertoire de destination
        $destination = "./images/" . $image_name;
    
        move_uploaded_file($image_tmp_name, $destination);
    } else {
        // Aucun fichier téléchargé
        $image_name = "";
    }

    // Requête d'insertion avec le nom de l'image
    $sql = "INSERT INTO student (username, email, password, niveau, classe, image) VALUES (:username, :email, :password, :niveau, :classe, :image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        ':niveau' => $niveau,
        ':classe' => $classe,
        ':image' => $image_name
    ));
}


// Supprimer un étudiant
if (isset($_GET['supprimer'])) {
    $id_etudiant = $_GET['supprimer'];

    // Requête de suppression
    $sql = "DELETE FROM student WHERE id_user  = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id' => $id_etudiant));

    $erreur = "Étudiant supprimé avec succès.";
}

// Modifier un étudiant
if (isset($_POST['modifier'])) {
    $id_etudiant = $_POST['id_user '];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $niveau = $_POST['niveau'];
    $classe = $_POST['classe'];

    // Requête de modification
    $sql = "UPDATE student SET username = :username, email = :email, password = :password, niveau = :niveau, classe = :classe WHERE id_user  = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':username' => $username, ':email' => $email, ':password' => $password, ':niveau' => $niveau, ':classe' => $classe, ':id' => $id_etudiant));

    $erreur = "Étudiant modifié avec succès.";
}

// Récupérer la liste des étudiants depuis la base de données
$sql = "SELECT * FROM student";
$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les étudiants</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
        }

        a:hover {
            color: #0056b3;
        }
        .etudiants {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.etudiant {
    width: calc(33.33% - 20px); /* Trois boîtes par ligne avec un espace entre */
    border: 2px solid #630229; 
    border-radius: 10px;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #f9f9f9; /* Couleur de fond */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
}

.etudiant-info {
    padding: 20px;
}

.etudiant-image {
    text-align: center;
}

.etudiant-image img {
    max-width: 80%;
    height: auto;
    display: block;
    margin: 0 auto;
    max-height: 150px; /* Taille maximale de l'image */
    
}

.etudiant-details {
    margin-top: 15px;
}

.etudiant-details h3 {
    margin: 0;
    font-size: 18px;
    color: #333; /* Couleur du texte */
}

.etudiant-details p {
    margin: 5px 0;
    font-size: 14px;
    color: #666; /* Couleur du texte */
}

.etudiant-actions {
    padding: 10px;
    text-align: center;
    background:  #630229;
}

.etudiant-actions a {
    text-decoration: none;
    color: #fff; /* Texte blanc */
    margin-right: 10px;
   
}

.etudiant-actions a:hover {
    color: #0056b3; /* Changement de couleur au survol */
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header h1 {
    margin: 0;
    margin-bottom: 50px;
    margin-top: 20px;
}

.header a {
    margin-left: 800px;
    text-decoration: underline;
    color: black;
    
}

.header img {
    margin-right: 50px;
    width: 40px; /* Ajustez la taille de l'icône selon vos besoins */
}


    </style>

</head>
<body>
<div class="header">
    <h1>Gérer les étudiants</h1>
    <a href="login.php">Déconnexion</a>
        <img src="images/icon_deconn.jpg" alt="Déconnexion">
    </a>
</div>


   

    <!-- Formulaire pour ajouter un étudiant -->
    <h2>Ajouter un étudiant</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <input type="text" name="niveau" placeholder="niveau" required><br>
        <input type="text" name="classe" placeholder="Classe" required><br>
        <input type="file" name="image" accept="image/*"><br>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>
      <!-- Afficher les messages d'erreur -->
    <div style="margin-bottom: 50px;" ><?php echo $erreur; ?></div>
    <!-- Liste des étudiants -->
    <h2 style="margin-bottom: 50px;" >Liste des étudiants</h2>
    <div class="etudiants">
    <?php foreach ($etudiants as $etudiant): ?>
        <div class="etudiant">
            <div class="etudiant-info">
                <p><strong>Nom d'utilisateur:</strong> <?php echo $etudiant['username']; ?></p>
                <p><strong>Email:</strong> <?php echo $etudiant['email']; ?></p>
                <p><strong>Niveau:</strong> <?php echo $etudiant['niveau']; ?></p>
                <p><strong>Classe:</strong> <?php echo $etudiant['classe']; ?></p>
            </div>
            <div class="etudiant-image">
                <?php if (!empty($etudiant['image'])): ?>
                    <img src="./images/<?php echo $etudiant['image']; ?>" alt="Image de l'étudiant">
                <?php endif; ?>
            </div>
            <div class="etudiant-actions">
                <a href="?supprimer=<?php echo $etudiant['id_user']; ?>">Supprimer</a>
                <a href="modifier_etudiant.php?id=<?php echo $etudiant['id_user']; ?>">Modifier</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    <canvas id="chart" width="400" height="400"></canvas>
    <script>
    // Récupérer les données des pourcentages des étudiants
    var pourcentages = {
        "Classe 1ing_GL": 50,
        "Classe licence": 30,
        "Classe 2ing_dataS": 20,
        "Classe 3ing_GL": 20,
        "Classe master": 10,
        "Classe prepa": 10
    };

    // Récupérer le contexte du canvas
    var ctx = document.getElementById('chart').getContext('2d');

    // Créer le graphique à secteurs
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(pourcentages), // Les classes
            datasets: [{
                label: 'Pourcentage des étudiants par classe',
                data: Object.values(pourcentages), // Les pourcentages
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(80, 120, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 180, 132, 0.7)',  // Rouge
                     'rgba(153, 102, 255, 0.7)', // Violet
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(80, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 180, 132, 0.7)',  // Rouge
                    'rgba(153, 102, 255, 0.7)', // Violet
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false // Désactiver la réactivité pour éviter le redimensionnement automatique
        }
    });
</script>

</body>
</html>
