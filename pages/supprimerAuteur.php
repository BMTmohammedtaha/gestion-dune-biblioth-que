<?php

$id_auteur = $_GET['id'];
$sql = "DELETE FROM authors WHERE id_auteur = ?";
$params = [$id_auteur];
$db = new DB();
$db->executeQuery($sql, $params);
header("Location: {$base_url}auteurs");
exit();
?>
