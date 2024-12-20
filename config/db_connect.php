<?php
  session_start();

  require_once __DIR__ . '/../src/Database.php';

  try {
      $database = new Database();
      $db = $database->getConnection();
  } catch(Exception $e) {
      die("Connection failed: Please try again later.");
  }
?>