<?php
session_start();

// Connexion à la base de données avec PDO
function connectDB() {
    try {
        $bdd = new PDO('mysql:host=localhost:3306;dbname=emilie-ponce_mamma_mia;charset=utf8', 'emilie-ponce', '*1Pxne681');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// Récupérer les ingrédients
function getIngredients() {
    $pdo = connectDB();
    $stmt = $pdo->query("SELECT * FROM ingredients");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Mettre à jour les ingrédients
function updateIngredient($id, $nom) {
    $pdo = connectDB();
    $sql = "UPDATE ingredients SET nom = :nom WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom' => $nom, 'id' => $id]);
}

// Supprimer un ingrédient
function deleteIngredient($id) {
    $pdo = connectDB();
    $sql = "DELETE FROM ingredients WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

// Gérer les actions (modification ou suppression)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update']) && !empty($_POST['id']) && !empty($_POST['nom'])) {
        updateIngredient($_POST['id'], $_POST['nom']);
    } elseif (isset($_POST['delete']) && !empty($_POST['id'])) {
        deleteIngredient($_POST['id']);
    }
}

$ingredients = getIngredients();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Ingrédients</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
</head>
<!--HEADER-->
<header class="header">
        <ul>
            <li><a href="menu.php"><img src="images/menu.png" alt="logo" height="50" width="50"></a></li>
            <li><a href="index.php"><h1 class="titre">MAMMA MIA</h1></a></li>
            <li><a href="deconnexion.php"><img src="images/connexion.png" alt="logo" height="50" width="50"></a></li>
        </ul>
    </header>
<body>
    <h1>Liste des Ingrédients</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($ingredients as $ingredient) : ?>
            <tr>
                <td><?= htmlspecialchars($ingredient['id']); ?></td>
                <td><?= htmlspecialchars($ingredient['nom']); ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($ingredient['id']); ?>">
                        <input type="text" name="nom" value="<?= htmlspecialchars($ingredient['nom']); ?>">
                        <button type="submit" name="update">Modifier</button>
                        <button type="submit" name="delete" onclick="return confirm('Supprimer cet ingrédient ?');">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!--FOOTER-->
    <footer class="footer">
        <div class="bas">
            <a href="index.php">Accueil</a>
            <a href="menu.php">Menu</a>
            <a href="connexion.php">Connexion</a>
        </div>
    </footer>
</body>
</html>