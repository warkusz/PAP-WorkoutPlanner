<?php
// Configurações do servidor local (XAMPP padrão)
$host = "localhost";
$user = "root";
$pass = "";       
$db   = "papdb"; 

// Criar a conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificar se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$conn->set_charset("utf8");


?>