<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<form method="post" action=<?= url_to('index') ?>>
    <label for="identifiant">Identifiant</label>
    <input id="identifiant" name="identifiant" type="text" />
    <label for="passwd">Mot de Passe</label>
    <input id="passwd" name="passwd" type="password" />
    <input type="submit" value="Valider">
</form>
<?= $this->endSection() ?>