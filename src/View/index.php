<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<link rel="stylesheet" href="<?=BASE_URI?>/css/style.css">
<script src="https://kit.fontawesome.com/8989f62e84.js" crossorigin="anonymous"></script>
<title><?= $config["app"]["title"]?></title>
</head>
<body>
<header>
<!-- NAVIGATION BAR -->
<img src="http://webacademie/PiePHP/assets/logo.jpg">
            <nav>
                <ul>
                    <li><a href="<?=BASE_URI?>/"><span><i class="fas fa-home"></i> Accueil</span></a></li>
                    <li><a href="<?=BASE_URI?>/film"><span><i class="fas fa-search"></i> Rechercher un film</span></a></li>
                    <li><a href="<?=BASE_URI?>"><span><i class="fas fa-photo-video"></i> Film à l'affiche</span></a></li>
                    <?php if(isset($user)):?>
                    <li><a href="<?=BASE_URI?>/membre"><span><i class="fas fa-user-friends"></i> Les membres</span></a></li>
                    <li><a href="<?=BASE_URI?>/profil"><span><i class="fas fa-wrench"></i> Mon profil</span></a></li>
                    <li><a href="<?=BASE_URI?>/logout"><span><i class="fas fa-user-times"></i> Deconnexion</span></a></li>
                    <?php else: ?>
                    <li><a href="<?=BASE_URI?>/login"><span><i class="far fa-user"></i> Connexion</span></a></li>
                    <li><a href="<?=BASE_URI?>/register"><span><i class="far fa-id-card"></i> S'inscrire</span></a></li>
                    <?php endif;?>
                </ul>
            </nav>
</header>
<?= $view ?>
<footer>
Blanche Alexandre - Web@cademie 2019.
</footer>
</body>
</html>