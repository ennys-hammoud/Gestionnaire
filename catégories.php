<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mamma_mia";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données de la table
$sql = "SELECT id, nom FROM plats";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catégories</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<!--HEADER-->
    <header class="header">
        <ul>
            <li><a href="menu.php"><img src="images/menu.png" alt="logo" height="50" width="50"></a></li>
            <li><a href="index.php"><h1 class="titre">MAMMA MIA</h1></a></li>
            <li><a href="deconnexion.php"><img src="images/connexion.png" alt="logo" height="50" width="50"></a></li>
        </ul>
    </header>

<!--formulaire choisir une entrée-->
    <form action="/votre_action" method="post">
        <label for="plat">Choisissez une entrée :</label>
        <select name="plat" id="plat">
            <?php
            if ($result->num_rows > 0) {
                // Afficher les données dans le menu déroulant
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["nom_du_plat"] . '</option>';
                }
            } else {
                echo '<option value="">Aucune entrée disponible</option>';
            }
            $conn->close();
            ?>
        </select>
        <br>
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>