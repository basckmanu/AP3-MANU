<!DOCTYPE html>
<html lang="en">


<!-- HEADER: MENU + HEROE SECTION -->
<header>
    <meta charset="UTF-8">
    <title>Publicom</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    
    <div class="menu">
        <ul>
            <li class="logo">
                <img class="img" src="/image/logo.png" />
            </li>
            <li class="menu-toggle">
                <button id="menuToggle">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="<?= url_to('index') ?>">Accueil</a></li>
            <?php
                    $user = auth()->user();
                    $admin = $user && $user->inGroup('admin');
                ?>
                <?= $admin ? '<li class="menu-item hidden"><a href="'.url_to('utilisateur').'">Gestion Utilisateurs</a></li>' : '' ?>
                <?= $admin ? '<li class="menu-item hidden"><a href="'.url_to('clients').'">Gestion Communes</a></li>' : '' ?>
            <li class="menu-item hidden"><a href="<?= url_to('message') ?>">Gestion Messages</a></li>
            <li class="menu-item hidden"><a href="<?= url_to('panneaux') ?>">Gestion Panneaux</a></li>
            <li class="menu-item hidden"><a href="<?= url_to('logout') ?>">Se Déconnecter</a></li>
        </ul>
    </div>
    
</header>

<script>
    function submit_click(){
        confirm("Vous vous apprêtez à supprimer une commune avec toutes les données reliées à cette commune, voulez vous continuer ?") || event.preventDefault();
    }
</script>

<body>
    <?= $this->renderSection('contenu') ?>

    
</body>
<footer>
        <div class="environment">

            <p>Nous transformons
                les idées en réalité.</p>

            <p>Publicom
                10 Route de Galice
                13100 Aix-en-Provence
                Tel. : 04 42 99 01 20</p>
            <a href="<?= url_to('contact') ?>">contact</a>

        </div>
        <div class="copyrights">

        <p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
            open source licence.</p>

        </div>
</footer>