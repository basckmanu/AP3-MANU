<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Ajouter Panneaux</h1>
<div class = "centre">
    <form action="<?= url_to("createPanneau") ?>" method="post">
        <label for="name">Nom Panneau</label>
        <input type="text" id="name" name="REFERENCE" value="">
        <!-- <label for="name">Commune</label> -->
        <!-- <select id="name" name="" value="">
        <option value="">--Choisissez une commune--</option>
        <option value="">$commune['NOM']?> - $commune['DEPARTEMENT']?></option>
    </select> -->
        <?php
            $user = auth()->user();
            if (! $user->inGroup('admin')) {
        ?>
                <label for="IDCOMMUNE">Commune</label>
                <input type="text" id="IDCOMMUNE" name="IDCOMMUNE" value=" <?= $communeId . ' - ' . $nomCommune . ' (' . $deptNum . ')' ?> " readonly />
        <?php
            }
            else {
        ?>
                <label for="IDCOMMUNE">Panneau</label>
                <select name="IDCOMMUNE">
                    <option value="">Choisissez un département</option>
                    <?php
                        foreach ($commune as $attribut) {
                            echo "<option value=" . $attribut['IDCOMMUNE'] . ">" . $attribut['NOM'] . " (" . $attribut['DEPARTEMENT'] . ")</option>";
                        }
            }
        ?>
        </select>
        <label for="latitude">Latitude</label>
        <input type="text" id="latitude" name="LATITUDE" value="">

        <label for="longitude">Longitude</label>
        <input type="text" id="longitude" name="LONGITUDE" value="">

        <input type="submit" value="Valider">
    </form>
</div>


<?= $this->endSection() ?>