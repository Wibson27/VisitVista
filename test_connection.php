<?php
  require_once __DIR__ . '/config/db_connect.php';

  try {
      if($db) {
          echo "Database connection successful!";

          // Test query
          $stmt = $db->query("SHOW TABLES");
          $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

          echo "<h3>Available Tables:</h3>";
          echo "<ul>";
          foreach($tables as $table) {
              echo "<li>$table</li>";
          }
          echo "</ul>";
      }
  } catch(Exception $e) {
      echo "Connection failed: " . $e->getMessage();
  }
?>