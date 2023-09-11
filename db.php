<?php
$host = 'localhost:4306';
$db = 'crudcontact';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host; dbname=$db; charset=$charset";
$username = 'root';
$password = '';
$pdo = new PDO($dsn, $username, $password);