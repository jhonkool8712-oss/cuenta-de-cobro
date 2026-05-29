<?php
// Para vista previa local con MySQL en la misma máquina:
$host = 'localhost';
$dbname = 'cuentacobro';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Si despliegas en alwaysdata, reemplaza los valores anteriores con los datos reales
// de conexión que te entrega alwaysdata, por ejemplo:
// $host = 'mysql.hosting-provider.com';
// $dbname = 'jhonatan1_cuentadecobro';
// $user = 'jhonatan1';
// $pass = 'tu_contrasena';

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
