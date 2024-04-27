<?php

$db = new DB();
$livres = $db->fetchAll('SELECT * FROM books');
?>

<div class="sub_nav">
    <a href="<?php echo $base_url ?>ajoutLivre"><button class="button_x">Ajoute</button></a>
</div>
<h2>Liste des livres</h2>
<table>
    <tr>
        <th>Titre</th>
        <th>Année d'édition</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($livres as $livre) : ?>
        <tr>
            <td><?php echo $livre['titre']; ?></td>
            <td><?php echo $livre['annee_edition']; ?></td>
            <td>
                <a href="<?php echo $base_url; ?>modifierLivre?code_livre=<?php echo $livre['code_livre']; ?>">
                    <button class="button_x">modifier</button>
                </a>
            </td>
            <td>
                <a href="<?php echo $base_url; ?>supprimerLivre?code_livre=<?php echo $livre['code_livre']; ?>">
                    <button class="button_x red">supprimer</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>