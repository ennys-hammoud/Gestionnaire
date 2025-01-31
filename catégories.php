<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            <option value="burrata">...</option>
            <option value="burrata">Burrata à la provençale</option>
            <option value="ratatouille">Carpaccio de boeuf</option>
        </select>
        <br>
        <input type="submit" value="Soumettre">
    </form>

<!--formulaire choisir un plat-->
    <form action="/votre_action" method="post">
        <label for="plat">Choisissez un plat :</label>
        <select name="plat" id="plat">
            <option value="burrata">...</option>
            <option value="burrata">Pizza au fromage</option>
            <option value="ratatouille">Linguines à la carbonara</option>
        </select>
        <br>
        <input type="submit" value="Soumettre">
    </form>

<!--formulaire choisir un dessert-->
    <form action="/votre_action" method="post">
        <label for="plat">Choisissez un dessert :</label>
        <select name="plat" id="plat">
            <option value="burrata">...</option>
            <option value="burrata">Tiramisu au café</option>
            <option value="ratatouille">Panna cotta aux fruits rouges</option>
        </select>
        <br>
        <input type="submit" value="Soumettre">
    </form>

<?php
    #chaîne de connexion à la BDD
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=mamma mia;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (Exception $e) {
        
    die('Erreur : ' . $e->getMessage());
    }
    
    //ajouter, modifier, surpprimer un plat
    $req = $pdo->prepare("INSERT INTO plats (nom, id_catégories) VALUES (?, ?)");
    $req->execute();
    $req = $pdo->prepare("UPDATE plats SET nom = 'burrata à la provençale' WHERE `id_catégories` = 1");
    $req->execute();
    $req = $pdo->prepare("DELETE FROM plats WHERE id = ?");
    $req->execute();
    
    //ajoutern modifier, surpprimer une catégorie
    $req = $pdo->prepare("INSERT INTO categories (nom_catégories) VALUES (?)");
    $req->execute();
    $req = $pdo->prepare("UPDATE categories SET nom_catégories = ? WHERE id = ?");
    $req->execute();
    $req = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $req->execute();

      
?>







</body>
</html>