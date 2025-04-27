<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Modifier Panneaux</h1>
<form action= "<?= url_to("updatePanneau") ?>" method="post">
    <label for="name">Nom Panneau</label>
    <input type="text" id="name" name="REFERENCE" value="<?= $panneau['REFERENCE'] ?>" >
    
    <label for="latitude">Latitude</label>
    <input type="text" id="latitude" name="LATITUDE" value="<?= $panneau['LATITUDE'] ?>" >

    <label for="longitude">Longitude</label>
    <input type="text" id="longitude" name="LONGITUDE" value="<?= $panneau['LONGITUDE'] ?>">

    <input name="IDPANNEAU" id="id" type="hidden" value="<?= $panneau['IDPANNEAU'] ?>" >
    <input type="submit" value="Valider" >
</form>


<?= $this->endSection() ?>



