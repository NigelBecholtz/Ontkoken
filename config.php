<?php

// $host = ""; // je database host
// $dbname = ""; // naam van je database
// $username = ""; // je database gebruikersnaam
// $password = ""; // je database wachtwoord

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit; // Stop de uitvoering als de verbinding mislukt.
}
