<?php

$db = new DB();
$auteurs = $db->fetchAll('SELECT * FROM authors');
?>
<div class="sub_nav">
    <a href="<?php echo $base_url ?>ajoutAuteur"><button class="button_x">Ajoute</button></a>
</div>
<h2>Liste des auteurs</h2>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th></th>
        <th>Operations</th>
    </tr>
    <?php foreach ($auteurs as $auteur) : ?>
        <tr>
            <td><?php echo $auteur['nom']; ?></td>
            <td><?php echo $auteur['prenom']; ?></td>
            <td>
                <a href="<?php echo $base_url; ?>modifierAuteur?id=<?php echo $auteur['id_auteur']; ?>">
                    <button class="button_x">modifier</button>
                </a>
            </td>
            <td>
                <a href="<?php echo $base_url; ?>supprimerAuteur?id=<?php echo $auteur['id_auteur']; ?>">
                    <button class="button_x red">supprimer</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>