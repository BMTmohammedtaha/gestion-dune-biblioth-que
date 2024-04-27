<?php

$code_livre = $_GET['code_livre'];
$sql = "DELETE FROM books WHERE code_livre = ?";
$params = [$code_livre];
$db = new DB();
$db->executeQuery($sql, $params);
header("Location: {$base_url}livres");
exit();
?>
