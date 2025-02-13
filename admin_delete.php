<?php
require 'config.php';

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['usertype'] != 1) {
    header("Location: login.php");
    exit;
}

// Foutmeldingen weergeven voor debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Controleer of een recept-ID is opgegeven
if (isset($_GET['receptid'])) {
    $receptid = $_GET['receptid'];

    // Verwijder eerst de favorieten die verwijzen naar dit recept
    $stmt = $pdo->prepare("DELETE FROM Favourites WHERE Recipe_ID = :receptid");
    $stmt->bindParam(':receptid', $receptid);
    $stmt->execute();

    // Verwijder het recept uit de `Recipes`-tabel
    $stmt = $pdo->prepare("DELETE FROM Recipes WHERE ReceptID = :receptid");
    $stmt->bindParam(':receptid', $receptid);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'>Recept succesvol verwijderd!</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Er is een fout opgetreden bij het verwijderen van het recept.</div>";
    }
}

// Haal alle recepten op om te tonen in de view
$stmt = $pdo->prepare("SELECT * FROM Recipes");
$stmt->execute();
$recepten = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'views/admin_delete_view.php';
