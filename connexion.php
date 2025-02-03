<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="connexion.css">
</head>
<body>
<section class="tete">
    
        <ul>
            <a href="menu.php"><img src="menu.png" alt="logo" height="50" width="50"></a>
        </ul>
        <a href="index.php"><div class="titre"><h1>MAMMA MIA</h1></div></a>
        <nav>
            <ul>
                <a href="connexion.php"><img src="connexion.png" height="50" width="50"></a>
            </ul>
        </nav>
    
</section>
<br>
<section class="co">
    <div class="formulaire">
        <form method="post" action="connexion.php">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" autocomplete="off">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" autocomplete="off">
            <input type="submit" value="Se connecter">
        </form>
    </div>
    <?php
        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=mia', 'root', '');
        if(isset($_POST['pseudo']) && isset($_POST['mdp'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mdp = htmlspecialchars($_POST['mdp']);

            $req = $bdd->prepare('SELECT * FROM user WHERE pseudo = ? AND mdp = ?');
            $req->execute(array($pseudo, $mdp));
            $resultat = $req->fetch();
            
            if(!$resultat){
                echo 'Mauvais identifiant ou mot de passe !';
            }else{
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $pseudo;
                echo 'Vous êtes connecté !';
                header('Location: index.php');
            }
        }
        ?>
</section>
<footer>
    <div class="bas">
        <a href="index.php">Accueil</a>
        <a href="menu.php">Menu</a>
        <a href="connexion.php">Connexion</a>
    </div>
</footer>
</body>
</html>