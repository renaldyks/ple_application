<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Users.php';

  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $data = json_decode(file_get_contents('php://input'));

  echo json_encode($data);

  $user->password = $data->password;
  $user->username = $data->username;
  $user->email = $data->email;
  $user->role = $data->role;
  $user->status = $data->status;
  $user->created_at = $data->created_at;

  echo json_encode($user);
  if($user->create($data)){
      echo json_encode(
          array('message' => 'User Created')
      );
  }else{
      echo json_encode(
          array('message' => 'User Failed')
      );
  }
?>