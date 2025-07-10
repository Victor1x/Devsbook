<?php

namespace src\models;

use \core\Model;
use src\models\User;

class Post extends Model
{
    private int $id;
    private User $user;
    private string $type;
    private string $created_at;
    private string $body;
    public function __construct($id, $user, $type, $created_at, $body)
    {
        $this->id = $id;
        $this->user = $user;
        $this->type = $type;
        $this->created_at = $created_at;
        $this->body = $body;
    }
    public function getUser(){
        return $this->user;
    }



    public function toArray(): array
    {
        return get_object_vars($this); // retorna ['nome' => ..., 'idade' => ..., 'email' => ...]
    }
}
