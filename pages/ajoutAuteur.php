<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);

    $sql = "INSERT INTO authors (nom, prenom) VALUES (?, ?)";
    $params = [$nom, $prenom];
    $db = new DB();
    $db->executeQuery($sql, $params);
    header("Location: {$base_url}auteurs");
    exit();
}
?>

<h2>Ajouter un auteur</h2>
<form method="post" action="<?php echo $path; ?>">
    <label for="nom">Nom: </label>
    <input type="text" name="nom"><br>
    <label for="prenom">Prénom: </label>
    <input type="text" name="prenom"><br>
    <input class="button_x" type="submit" value="Ajouter">
</form>