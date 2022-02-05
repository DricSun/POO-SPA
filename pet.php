<?php

class pet
{
    private $type;
    private $name;
    private $id_owner;
    private $id_animal;

    public function __construct($type, $name, $id_owner, $id_animal){
        $this->name = $name;
        $this->type= $type;
        $this->id_owner = $id_owner;
        $this->id_animal = $id_animal;
    }
    public function getIdOwner()
    {
        return $this->id_owner;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getIdAnimal()
    {
        return $this->id_animal;
    }
}
