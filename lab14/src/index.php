<?php
echo "<h1>Stack LEMP dziala poprawnie!</h1>";

$host = 'mysql-db';
$user = 'root';
$pass = 'secret_root_password';
$db   = 'test_db';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p> Poprawnie polaczono z baza danych MySQL</p>";
} catch(PDOException $e) {
    echo "<p> Blad polaczenia:" . $e->getMessage() . "</p>";
}
?>