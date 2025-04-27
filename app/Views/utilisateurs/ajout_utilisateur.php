<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<form method="post" action="">
    <label for="departement">Département</label>
    <select name="IDCOMMUNE">
        <option value="">Choisissez un département</option>
        <?php
        foreach ($listeUtilisateur as $user) {
            echo "<option value=" . $user['IDCOMMUNE'] . ">" . $user['NOM'] . " (" . $user['DEPARTEMENT'] . ")</option>";
        }
        ?>
    </select>
    <label for="mail">Mail</label>
    <input id="mail" name="MAIL" type="text" />
    <label for="identifiant">Identifiant de l'Utilisateur</label>
    <input id="identifiant" name="IDENTIFIANT" type="text" />
    <label for="motdepasse">Mot de Passe</label>
    <input id="motdepasse" name="MOTDEPASSE" type="password" />
    <label for="role">Rôle</label>
    <select name="ROLE">
        <option value="">Choisissez un rôle</option>
        <option value="0">Utilisateur</option>
        <option value="1">Admin</option>
        </select>
    <input type="submit" value="Valider">
</form>
<?= $this->endSection() ?>