<?php

$host = "database-5017150378.webspace-host.com"; // je database host
$dbname = "dbs13783533"; // naam van je database
$username = "dbu5576770"; // je database gebruikersnaam
// $password = ""; // je database wachtwoord

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit; // Stop de uitvoering als de verbinding mislukt.
}
