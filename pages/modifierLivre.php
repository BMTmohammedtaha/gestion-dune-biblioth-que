<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code_livre = $_POST['code_livre'];
    $titre = $_POST['titre'];
    $annee_edition = $_POST['annee_edition'];

    $sql = "UPDATE books SET titre = ?, annee_edition = ? WHERE code_livre = ?";
    $params = [$titre, $annee_edition, $code_livre];
    $db = new DB();
    $db->executeQuery($sql, $params);
    header("Location: {$base_url}livres");
    exit();
}

$code_livre = $_GET['code_livre'];
$db = new DB();
$livre = $db->fetchOne('SELECT * FROM books WHERE code_livre = ?', [$code_livre]);
?>

<h2>Modifier un livre</h2>
<form method="post" action="<?php echo $path; ?>">
    <input type="hidden" name="code_livre" value="<?php echo $code_livre; ?>">
    Titre: <input type="text" name="titre" value="<?php echo $livre['titre']; ?>"><br>
    Année d'édition: <input type="text" name="annee_edition" value="<?php echo $livre['annee_edition']; ?>"><br>
    <input type="submit" class="button_x" value="Modifier">
</form>