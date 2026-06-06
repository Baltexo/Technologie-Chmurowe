<?php
echo "<h1>Stack LEMP dziala poprawnie!</h1>";

$host = 'mysql-db';
$user = 'root';
$db   = 'test_db';

$secret_path = '/run/secrets/db_root_password';

if (file_exists($secret_path)) {
    $pass = trim(file_get_contents($secret_path));
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p> Poprawnie polaczono z baza danych MySQL z Docker Secrets</p>";
    } catch(PDOException $e) {
        echo "<p> Blad polaczenia: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p> Nie odnaleziono pliku pod sciezka: $secret_path</p>";
}
?>