<?php

try {

  $conn = new PDO("mysql:host=$servername;dbname=crevatti", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Połączono pomyślnie";

} catch(PDOException $e) {

  echo "Niepowodzenie: " . $e->getMessage();
  die();

}