<?php
session_start(); // Démarrer la session

class Ingredient {
    private $id;
    private $name;
    private $quantity;

    public function __construct($id, $name, $quantity) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}

class IngredientManager {
    public function __construct() {
        if (!isset($_SESSION['ingredients'])) {
            $this->initializeIngredients();
        }
    }

    private function initializeIngredients() {
        $ingredientsList = [
            "Lait de vache", "Crème fraîche", "Citron", "Sel", "Huile d'olive",
            "Basilic", "Poivre noir", "Tomates", "Filet de bœuf", "Parmesan",
            "Roquette", "Câpres", "Truffe", "Vinaigre balsamique", "Farine",
            "Eau tiède", "Levure boulangère", "Sucre", "Sauce tomate", "Mozzarella",
            "Fromage de chèvre", "Gorgonzola", "Spaghetti", "Guanciale"
        ];
        $_SESSION['ingredients'] = [];
        $id = 1;
        foreach ($ingredientsList as $ingredientName) {
            $_SESSION['ingredients'][$id] = new Ingredient($id, $ingredientName, rand(1, 10));
            $id++;
        }
    }

    public function getIngredients() {
        return $_SESSION['ingredients'];
    }

    public function updateIngredientQuantity($id, $quantity) {
        if (isset($_SESSION['ingredients'][$id])) {
            $_SESSION['ingredients'][$id]->setQuantity($quantity);
        }
    }

    public function removeIngredient($id) {
        unset($_SESSION['ingredients'][$id]);
    }
}

$manager = new IngredientManager();

// Gestion des actions (modification ou suppression)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $manager->updateIngredientQuantity($_POST['id'], $_POST['quantity']);
    } elseif (isset($_POST['delete'])) {
        $manager->removeIngredient($_POST['id']);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Ingrédients</title>
</head>
<body>
    <h1>Liste des Ingrédients</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($manager->getIngredients() as $ingredient) : ?>
            <tr>
                <td><?= $ingredient->getId(); ?></td>
                <td><?= $ingredient->getName(); ?></td>
                <td><?= $ingredient->getQuantity(); ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $ingredient->getId(); ?>">
                        <input type="number" name="quantity" value="<?= $ingredient->getQuantity(); ?>" min="0">
                        <button type="submit" name="update">Modifier</button>
                        <button type="submit" name="delete" onclick="return confirm('Supprimer cet ingrédient ?');">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
