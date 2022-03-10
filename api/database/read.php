<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Users.php';

  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $result = $user->read();

  echo json_encode($result->fetch(PDO::FETCH_ASSOC));
?>