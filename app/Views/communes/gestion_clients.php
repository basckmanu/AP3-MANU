<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<section>

    <a class="button" href="<?= url_to('ajoutCommune') ?>">Nouvelle commune</a>
    <?php
    $table = new \CodeIgniter\View\Table();

    $table->setHeading(['Nom', 'Departement', 'Modifier', 'Supprimer','Gestion panneaux']);
    foreach ($listeCommune as $commune => $va) {

        $table->addRow(
            $va['NOM'],
            $va['DEPARTEMENT'],
            '<a class="button" href="' . url_to('modifCommune', $va['IDCOMMUNE']) . '">modifier</a>',
            '<form  method="post" action="' . url_to('supprCommune', $va['IDCOMMUNE']) . '">
                <input type="hidden" name="IDCOMMUNE" value="' . $va['IDCOMMUNE'] . '">
                <input class="form-suppr" type="submit" value="Supprimer" onclick=submit_click()>
            </form>',
            
            '<a class="button" href="' . url_to('panneaux') . '">Panneaux</a>',
        );
    }

    echo $table->generate();
    ?>
</section>

<?= $this->endSection() ?>