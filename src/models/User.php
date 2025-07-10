<?php


namespace src\models;

use \core\Model;

class User extends Model
{
    private $loggedUser;
    private int $id;
    private string $email;
    private string $name;
    private string $avatar;
    public function __construct ($id, $email, $name,$avatar)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->avatar = $avatar;
    }


    public function toArray(): array {
        return get_object_vars($this); // retorna ['nome' => ..., 'idade' => ..., 'email' => ...]
    }

}