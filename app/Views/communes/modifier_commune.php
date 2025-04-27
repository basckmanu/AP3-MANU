<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>


<form action="<?= url_to("updateCommune") ?>" method="post">
  <label for="nom">Nom de la commune</label>
  <input type="text" id="name" name="nom" value=<?= $commune['NOM'] ?>>
  <label for="dep">Département</label>
  <input type="text" id="departement" name="departement" value=<?= $commune['DEPARTEMENT'] ?>>
  <input type="submit" value="Modifier" />
  <input id="IDCOMMUNE" name="IDCOMMUNE" type="hidden" value="<?= $commune['IDCOMMUNE'] ?>">
</form>



<?= $this->endSection() ?>