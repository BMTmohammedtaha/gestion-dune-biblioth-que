<?php

$db = new DB();
$auteurs = $db->fetchAll('SELECT * FROM authors');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auteur_id = $_POST['auteur'];

    $sql = "SELECT books.* FROM books JOIN book_author ON books.code_livre = book_author.code_livre WHERE book_author.id_auteur = ?";
    $livres = $db->fetchAll($sql, [$auteur_id]);
}
?>


<h2>Recherche de livres par auteur</h2>
<form method="post" action="<?php echo $path; ?>">
    <label for="auteur">Sélectionnez un auteur:</label>
    <select name="auteur">
        <?php foreach ($auteurs as $auteur) : ?>
            <option value="<?php echo $auteur['id_auteur']; ?>"><?php echo $auteur['nom'] . ' ' . $auteur['prenom']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" class="button_x"  value="Rechercher">
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
    <h3>Résultats de la recherche :</h3>
    <ul class="list_livres">
        <?php foreach ($livres as $livre) : ?>
            <li><?php echo $livre['titre']; ?> (Année d'édition: <?php echo $livre['annee_edition']; ?>)</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>