<?php 

$host = 'localhost';
$db = 'faq_system';
$user = 'root';
$pass = '74396Gr8!';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);