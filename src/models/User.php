<?php


namespace src\models;

use \core\Model;

class User extends Model
{
    private $loggedUser;
    private $id;
    private $email;
    private  $name;
    public function __construct($id,$name,$email)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
    }


}