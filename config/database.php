<?php
  return [
    'development' => [
        'host' => 'localhost',
        'db_name' => 'visitvista',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4'
    ],
    'production' => [
        'host' => getenv('DB_HOST'),
        'db_name' => getenv('DB_NAME'),
        'username' => getenv('DB_USER'),
        'password' => getenv('DB_PASSWORD'),
        'charset' => 'utf8mb4'
    ]
  ];
?>