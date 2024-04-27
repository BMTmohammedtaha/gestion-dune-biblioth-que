<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $livres = $_POST['livres'];
    $auteur = $_POST['auteur'];

    $db = new DB();
    foreach ($livres as $livre) {
        $sql = "INSERT INTO book_author (code_livre, id_auteur) VALUES (?, ?)";
        $params = [$livre, $auteur];
        $db->executeQuery($sql, $params);
    }
    header("Location: $path");
    exit();
}

$db = new DB();
$livres = $db->fetchAll('SELECT * FROM books');
$auteurs = $db->fetchAll('SELECT * FROM authors');
?>
<h2>Affectation des livres aux auteurs</h2>
<form method="post" action="<?php echo $path ?>">
    <?php foreach ($livres as $livre) : ?>
        <input type="checkbox" name="livres[]" value="<?php echo $livre['code_livre']; ?>" id="<?php echo $livre['code_livre']; ?>">
        <label for="<?php echo $livre['code_livre']; ?>"><?php echo $livre['titre']; ?></label>
        <br>
    <?php endforeach; ?>
    <br>
    <label for="auteur">Auteur:</label>
    <select name="auteur">
        <?php foreach ($auteurs as $auteur) : ?>
            <option value="<?php echo $auteur['id_auteur']; ?>"><?php echo $auteur['nom'] . ' ' . $auteur['prenom']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" class="button_x" value="Affecter">
</form>