<?php


namespace src\models;

use \core\Model;

class User extends Model
{
    private $loggedUser;
    public $id;
    public $email;

    public $name;

    public function __construct($id, $email, $name)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
    }


}