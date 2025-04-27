<?= $this->extend('layout') ?>
<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> -->
<!--
<script src="map.js"> </script> -->
<?= $this->section('contenu') ?>

<div id="map"> </div>
<a class="bouton" href="<?= url_to('ajoutPanneau') ?>">Ajouter</a>

<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading('Panneaux', 'Latitude', 'Longitude', 'Département','Message', 'Modifier', 'Supprimer');

foreach ($listePanneaux as $colonne => $c) {

    $table->addRow(
        $c['REFERENCE'],
        $c['LATITUDE'],
        $c['LONGITUDE'],
        $c['NOM'],
        '<a class="button" href="' . url_to('message') . '">Message</a>',
        '<a class="bouton" href="' . url_to('modifPanneau', $c['IDPANNEAU']) . '">Modifier</a>',
        '<form  method="post" action="' . url_to('supprPanneau', $c['IDPANNEAU']) . '">
                <input type="hidden" name="IDPANNEAU" value="' . $c['IDPANNEAU'] . '">
                <input type="submit" value="Supprimer">
            </form>'
    );
    echo $table->generate();
}

?>


<?= $this->endsection('contenu') ?>