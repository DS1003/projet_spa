<?php
require_once 'PATHPROMOTION';

$id = $_POST['id'];
$status = $_POST['status'];

$query = "UPDATE promotions SET status = ? WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$status, $id]);

echo "La promotion a été mise à jour avec succès.";
