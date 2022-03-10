<?php
 class User{
     // DB
     private $conn;
     private $table = 'users';

    // User Properties
    public $id;
    public $username;
    public $password;
    public $role;
    public $email;
    public $status;
    public $created_at;

    // Construct
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Read
    public function read(){
        //query
        $query = 'SELECT * FROM '.$this->table;

        // prepare
        $stmt = $this->conn->prepare($query);

        //execute
        $stmt->execute();

        return $stmt;
    }

    // Create
    public function create($data){
        echo ($data);
        //query
        $query = 'INSERT INTO '.$this->table .'(user_password,user_username,user_email,user_role,user_status,user_created_at) VALUES ('.$this->password.','.$this->username.','.$this->email.','.$this->status.','.$this->created_at.')';

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()) {
            return true;
        }else return false;
    }
 }
?>