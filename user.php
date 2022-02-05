<?php

require_once 'pet.php';

class user
{
    private  $password;
    private  $first_name;
    private  $last_name;
    private  $email;
    private  $id;
    private  $animals;

    public function __construct($email, $password, $first_name, $last_name, $id){
        $this->password = $password;
        $this->last_name= $last_name;
        $this->first_name = $first_name;
        $this->email = $email;
        $this->id = $id;
        $this->animals = array();
    }

    public function AddAnimal($animal){
       array_push($this->animals, $animal);
    }

    public function getAnimals()
    {
        return $this->animals;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function Redirect(){
        header('Location: user_view.php');
    }
}

