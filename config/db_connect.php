<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

try {
  $db = new PDO(
      "mysql:host=localhost;dbname=visitvista;charset=utf8mb4",
      "root",  // Replace with your database username
      "",      // Replace with your database password
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>