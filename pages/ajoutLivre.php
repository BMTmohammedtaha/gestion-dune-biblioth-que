<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $annee_edition = $_POST['annee_edition'];

    $sql = "INSERT INTO books (titre, annee_edition) VALUES (?, ?)";
    $params = [$titre, $annee_edition];
    $db = new DB();
    $db->executeQuery($sql, $params);
    header("Location: {$base_url}livres");
    exit();
}
?>

<h2>Ajouter un livre</h2>
<form method="post" action="<?php echo $path ?>">
    Titre: <input type="text" name="titre"><br>
    Année d'édition: <input type="text" name="annee_edition"><br>
    <input class="button_x" type="submit" value="Ajouter">
</form>