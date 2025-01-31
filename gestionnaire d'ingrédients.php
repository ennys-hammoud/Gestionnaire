<?php
session_start();

// Connexion à la base de données avec PDO
function connectDB() {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gestionnaire;charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// Récupérer tous les ingrédients
function getIngredients() {
    $pdo = connectDB();
    $stmt = $pdo->query("SELECT * FROM ingredients");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Mettre à jour la quantité d'un ingrédient
function updateIngredient($id, $quantite) {
    $pdo = connectDB();
    $sql = "UPDATE ingredients SET quantite = :quantite WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['quantite' => $quantite, 'id' => $id]);
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
    if (isset($_POST['update'])) {
        updateIngredient($_POST['id'],);
    } elseif (isset($_POST['delete'])) {
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
    <link rel="stylesheet" type="text/css" href="ingredients.css">
</head>
<header class="tete">
    <ul>
        <li><a href="menu.php"><img src="menu.png" alt="logo" height="50" width="50"></a></li>
        <li><a href="index.php"><h1 class="titre">MAMMA MIA</h1></a></li>
        <li><a href="deconnexion.php"><img src="connexion.png" alt="logo" height="50" width="50"></a></li>
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
                        <button type="submit" name="update">Modifier</button>
                        <button type="submit" name="delete" onclick="return confirm('Supprimer cet ingrédient ?');">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
