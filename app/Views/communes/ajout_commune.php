<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<form action="<?= url_to('createCommune') ?>" method="post">
  <label for="ajout">Formulaire d'ajout d'une commune </label><p>
  <label for="nom">Nom</label>
  <input type="text" id="name" name="nom" />
  <label for="departement">Département</label>
  <input type="text" id="departement" name="departement" />
  <input type="submit" value="Ajouter" />
</form>

<?= $this->endSection() ?>