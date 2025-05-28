<?= $this->extend('layout')  ?>

<?= $this->section('contenu') ?>

<?php

use \CodeIgniter\View\Table;

$table = new Table();

?>

<a class="button" href="<?= url_to('ajoutMessage') ?>">Ajouter un message</a>
<a class="button" href="<?= url_to('message') . '?non_expire=1' ?>">Messages non expirés</a>
<a class="button" href="<?= url_to('message') ?>">Tous les messages</a>
<?php

$table->setHeading('État', 'Texte', 'Caractéristiques', 'Expiration', 'Modifier', 'Supprimer');

foreach ($messages as $message) {
    $expiration = $message['EXPIRATION'] ?? 'Non définie';

    $table->addRow(
        $message['ETAT'],
        $message['TEXTE'],
        $message['COULEUR'],
        $expiration,
        '<a class="button" href="' . url_to('modifMessage', $message['IDMESSAGE']) . '">Modifier</a>',
        '<form method="post" class="form" action="' . url_to('supprMessage', $message['IDMESSAGE']) . '">
            <input type="hidden" name="IDMESSAGE" value="' . $message['IDMESSAGE'] . '">
            <input type="submit" value="Supprimer">
        </form>'
    );
}

echo $table->generate();

?>

<?= $this->endSection() ?>