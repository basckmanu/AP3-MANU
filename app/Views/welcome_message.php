<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<!DOCTYPE html>
<html lang="en">
   
<section>
    <img class="groupe" src="/image/groupe.jpg" />

    <p class="texte">Nous transformons les idées en réalité.
        Publicom c’est la fusion de publicité & communication avec une forte appétence Design & Digitale : rien que pour vous, par nous !

        Avec un concentré de compétences pour agir de manière agile, nos missions sont menées sans détours pour rendre vos projets uniques.

        Pour y parvenir, il y a la forme ● et le fond ■.

        Traversant et dépassant le temps et les attentes, notre agence de communication à Aix-en-Provence grandit et se métamorphose en permanence pour s'adapter aux nouvelles mouvances créatives.</p>
</section>


</header>


<!-- SCRIPTS -->

<script {csp-script-nonce}>
    document.getElementById("menuToggle").addEventListener('click', toggleMenu);
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
<?= $this->endSection() ?>
</html>
