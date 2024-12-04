<?php
$servername = "localhost";
$username = "root";      
$password = "";           
$dbname = "hospital"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>