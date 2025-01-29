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
        <?php
        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=mia', 'root', '');

        if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
            $pseudo = ($_POST['pseudo']);
            $mdp = ($_POST['mdp']);

            // Vérifier si l'utilisateur existe déjà
            $recupUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ? AND mdp = ?');
            $recupUser->execute(array($pseudo, $mdp));

            if ($recupUser->rowCount() == 0) {
                $insertUser = $bdd->prepare('INSERT INTO user(pseudo, mdp) VALUES(?, ?)');
                $insertUser->execute(array($pseudo, $mdp));

                $recupUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ? AND mdp = ?');
                $recupUser->execute(array($pseudo, $mdp));
            }

            if ($recupUser->rowCount() > 0) {
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $recupUser->fetch()['id'];
                echo "bonjour " . $_SESSION['pseudo'];
            }
        }

        if (isset($_SESSION['pseudo'])) {
            echo '<form method="post" action="deconnexion.php" align="center">
                    <input type="submit" value="Déconnexion">
                    </form>';
        } else {
            echo '<form method="post" action="" align="center">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" required autocomplete="off">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" required autocomplete="off">
                    <input type="submit" value="Connexion">
                    </form>';
        }
        ?>
    </div>
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