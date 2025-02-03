<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="menu.css">
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

<!--MENU-->
    <section class="menu">
        <div class="menuuu">
            <div class="entreeplatdessert">
                <a href="catégories.php">
                    <img class="burrata" src="images/burrata.png" alt="photo burrata à la provençale">
                </a>
                <h3 class="nomplat">Burrata à la provençale</h3>
                <?php
                $bdd = new PDO('mysql:host=localhost:3306;dbname=emilie-ponce_mamma_mia;charset=utf8', 'emilie-ponce', '*1Pxne681');
                $reponse = $bdd->query('SELECT nom FROM `ingredients` LIMIT 8');/*les 8 premières ligne de la bdd*/
                ?>
                <ul class="php">
                <?php 
                while ($donnees = $reponse->fetch()) {
                    echo '<li class="php1">' . $donnees['nom'] . '</li>';
                }
                ?>
                </ul>
                <?php
                $reponse->closeCursor();
                ?>
            </div>
        </div>

        <div class="menuuu">
            <div class="entreeplatdessert">
                <a href="catégories.php">
                    <img class="linguine" src="images/linguines à la carbonara.png" alt=" photo linguines à la carbonara">
                </a>
                <h3 class="nomplat">Linguines à la carbonara</h3>
                <?php
                $bdd = new PDO('mysql:host=localhost:3306;dbname=emilie-ponce_mamma_mia;charset=utf8', 'emilie-ponce', '*1Pxne681');
                $reponse = $bdd->query('SELECT nom FROM `ingredients`LIMIT 23,4');/*on compte 4 lignes à partir de la 23e de la bdd*/
                ?>
                <ul class="php">
                <?php 
                while ($donnees = $reponse->fetch()) {
                    echo '<li class="php1">' . $donnees['nom'] . '</li>';
                }
                ?>
                </ul>
                <?php
                $reponse->closeCursor();
                ?>
            </div>
        </div>

        <div class="menuuu">
            <div class="entreeplatdessert">
                <a href="catégories.php">
                    <img class="tiramisu" src="images/tiramisu.png" alt="image tiramisu au café">
                </a>
                <h3 class="nomplat">Tiramisu au café</h3>
                <?php
                $bdd = new PDO('mysql:host=localhost:3306;dbname=emilie-ponce_mamma_mia;charset=utf8', 'emilie-ponce', '*1Pxne681');
                $reponse = $bdd->query('SELECT nom FROM `ingredients`LIMIT 27,4');/*on compte 4 lignes à partir de la 27e de la bdd*/
                ?>
                <ul class="php">
                <?php 
                while ($donnees = $reponse->fetch()) {
                    echo '<li class="php1">' . $donnees['nom'] . '</li>';
                }
                ?>
                </ul>
                <?php
                $reponse->closeCursor();
                ?>
            </div>
        </div>
    </section>

    <section class="suitemenu">
        <div class="menuuu">
            <div class="entreeplatdessert">
                <a href="catégories.php">
                    <img class="carpaccio" src="images/carpaccio.png" alt="image carpaccio de boeuf">*
                </a>
                <h3 class="nomplat">Carpaccio de boeuf</h3>
                <?php
                $bdd = new PDO('mysql:host=localhost:3306;dbname=emilie-ponce_mamma_mia;charset=utf8', 'emilie-ponce', '*1Pxne681');
                $reponse = $bdd->query('SELECT nom FROM `ingredients`LIMIT 8, 6');/*on compte 6 lignes à partir de la 8e de la bdd*/
                ?>
                <ul class="php">
                <?php 
                while ($donnees = $reponse->fetch()) {
                    echo '<li class="php1">' . $donnees['nom'] . '</li>';
                }
                ?>
                </ul>
                <?php
                $reponse->closeCursor();
                ?>
            </div>
        </div>

        <div class="menuuu">
            <div class="entreeplatdessert">
                <a href="catégories.php">
                    <img class="pizza" src="images/pizza au fromage.png" alt="image pizza au fromage">
                </a>
                <h3 class="nomplat">Pizza au fromage</h3>
                <?php
                $bdd = new PDO('mysql:host=localhost:3306;dbname=emilie-ponce_mamma_mia;charset=utf8', 'emilie-ponce', '*1Pxne681');
                $reponse = $bdd->query('SELECT nom FROM `ingredients`LIMIT 14, 9');/*on compte 9 lignes à partir de la 14e de la bdd*/
                ?>
                <ul class="php">
                <?php 
                while ($donnees = $reponse->fetch()) {
                    echo '<li class="php1">' . $donnees['nom'] . '</li>';
                }
                ?>
                </ul>
                <?php
                $reponse->closeCursor();
                ?>
            </div>
        </div>

        <div class="menuuu">
            <div class="entreeplatdessert">
                <a href="catégories.php">
                    <img class="pannacotta" src="images/panna cotta.png" alt="image panna cotta aux fruits rouges">
                </a>
                  <h3 class="nomplat">Panna cotta aux fruits rouges</h3>
                  <?php
                $bdd = new PDO('mysql:host=localhost:3306;dbname=emilie-ponce_mamma_mia;charset=utf8', 'emilie-ponce', '*1Pxne681');
                $reponse = $bdd->query('SELECT nom FROM `ingredients`LIMIT 31, 5');/*on compte 5 lignes à partir de la 31e de la bdd*/
                ?>
                <ul class="php">
                <?php 
                while ($donnees = $reponse->fetch()) {
                    echo '<li class="php1">' . $donnees['nom'] . '</li>';
                }
                ?>
                </ul>
                <?php
                $reponse->closeCursor();
                ?>
            </div>
        </div>
    </section>

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