<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<?php

use \CodeIgniter\View\Table;

$table = new table();

?>

<a class=button href=<?= url_to('ajoutUtilisateur') ?>>Ajouter un utilisateur</a>
<section>
<?php

$table->setHeading('Nom Commune', 'Département', 'Identifiant et Mail', 'Modifier', 'Supprimer');

// var_dump($listeUtilisateur);

foreach ($listeUtilisateur as $user) {
    // var_dump($user);
    $table->addRow(
        $user->NOM, // $user->nom
        $user->DEPARTEMENT,
        $user->user_mail,
        '<a class=button href="' . url_to('modifUtilisateur', $user->id) . '">Modifier</a>',
        '<form method="post" class=form action="' . url_to('supprUtilisateur', $user->id) . '">
            <input type="hidden" name="IDUTILISATEUR" value="' . $user->id . '">
            <input type="submit" value="Supprimer">
        </form>',

    );
}
echo $table->generate();
?>
</section>
<?= $this->endSection() ?>