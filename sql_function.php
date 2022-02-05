<?php

require_once 'connect.php';
require_once 'pet.php';

class sql_function
{
    private $connection;

    public function __construct(connect $connect)
    {
        $this->connection = $connect-> getConnection();
    }
    public function VerifyUser($email, $password){
        $req = 'SELECT * from users where email = :email AND password = :password';

        $query = $this->connection->prepare($req);

         $query->execute(['email'=>$email, 'password'=>$password]);

        return $query->rowCount()>= 1;
    }
    public function InsertUser($email, $last_name, $first_name, $password){
        $req = 'INSERT INTO users (email, password, last_name, first_name) VALUES (:email, :password, :last_name, :first_name)';

        $query = $this->connection->prepare($req);

        $query->execute(['email'=>$email, 'password'=>$password, 'last_name'=>$last_name, 'first_name'=>$first_name]);
    }
    public function GetUser($email){
        $req = 'SELECT * from users where email = :email';

        $query = $this->connection->prepare($req);

        $query->execute(['email'=>$email]);

        return $query->fetch();
    }
    public function AddAnimal($name, $type, $id_owner){
        $req = 'INSERT INTO pet (name, type, id_owner) VALUES (:name, :type, :id_owner)';

        $query = $this->connection->prepare($req);

        $query->execute(['name'=>$name, 'type'=>$type, 'id_owner'=>$id_owner]);

        $stmt = $this->connection->query("SELECT LAST_INSERT_ID()");
        $lastId = $stmt->fetchColumn();

        return new pet($type, $name,$id_owner,$lastId);
    }
    public function DeleteAnimal( $id_animal){
        $req = 'DELETE from pet where id = :id_animal';

        $query = $this->connection->prepare($req);

        $query->execute(['id_animal'=>$id_animal]);
    }
    public function SelectAnimalsFromIdOwner($id_owner){
        $req = 'SELECT * from pet where id_owner = :id_owner';

        $query = $this->connection->prepare($req);

        $query->execute(['id_owner'=>$id_owner]);

        return $query->fetchAll();
    }
    public function GetAllUsers(){
        $req = 'SELECT * from users where admin = 0';

        $query = $this->connection->query($req);

        return $query->fetchAll();
    }
}







