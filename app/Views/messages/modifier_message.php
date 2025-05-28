<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Modifier un message</h1>

<form method="post" action="<?= url_to('updateMessage') ?>">
    <input type="hidden" name="IDMESSAGE" value="<?= $message['IDMESSAGE'] ?>" />

    <!-- <label for="idcommune">Commune :</label>
    <select name="IDCOMMUNE" id="idcommune">
        <option value="">--Choisir une commune--</option>
        php foreach ($listeCommune as $commune) : ?>
            <option value="= $commune['IDCOMMUNE'] ?>" = $message['IDCOMMUNE'] == $commune['IDCOMMUNE'] ? 'selected' : '' ?>>
                = $commune['NOM'] ?>
            </option>
        php endforeach; ?>
    </select> -->

    <label for="etat">État :</label>
    <input type="text" id="etat" name="ETAT" value="<?= $message['ETAT'] ?>" required />

    <label for="texte">Texte :</label>
    <input type="text" id="texte" name="TEXTE" value="<?= $message['TEXTE'] ?>" required />

    <label for="couleur">Couleur</label>
    <input type="color" id="COULEUR" name="COULEUR" value="<?= $message['COULEUR'] ?>" required />

    <label for="couleur">Expiration</label>
    <input type="date" id="EXPIRATION" name="EXPIRATION" value="<?= $message['EXPIRATION'] ?>" required />

   <!-- <label for="taille">Taille :</label>
    <input type="text" id="taille" name="TAILLE" value="<?= $message['TAILLE'] ?>" required /> -->

    <input type="submit" value="Mettre à jour" />
</form>

<?= $this->endSection() ?>
