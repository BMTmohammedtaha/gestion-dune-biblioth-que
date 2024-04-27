<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_auteur = $_POST['id_auteur'];
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);

    $sql = "UPDATE authors SET nom = ?, prenom = ? WHERE id_auteur = ?";
    $params = [$nom, $prenom, $id_auteur];
    $db = new DB();
    $db->executeQuery($sql, $params);
    header("Location: {$base_url}auteurs");
    exit();
}

$id_auteur = $_GET['id'];
$db = new DB();
$auteur = $db->fetchOne('SELECT * FROM authors WHERE id_auteur = ?', [$id_auteur]);
?>


    <h2>Modifier un auteur</h2>
    <form method="post" action="<?php echo $path; ?>">
        <input type="hidden" name="id_auteur" value="<?php echo $id_auteur; ?>">
        Nom: <input type="text" name="nom" value="<?php echo $auteur['nom']; ?>"><br>
        Prénom: <input type="text" name="prenom" value="<?php echo $auteur['prenom']; ?>"><br>
        <input class="button_x" type="submit" value="Modifier">
    </form>
