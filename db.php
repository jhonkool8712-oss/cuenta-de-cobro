<?php
$host = 'jhonatan1_cuentadecobro';
$dbname = 'cuentacobro';
$user = 'jhonatan1';
$pass = 'clase123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . htmlspecialchars($e->getMessage());
    exit;
}
