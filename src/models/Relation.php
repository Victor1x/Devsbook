<?php

namespace src\models;

use core\Model;
//class para saber lista de usuario seguei
class Relation extends Model
{

    public function toArray(): array {
        return get_object_vars($this); // retorna ['nome' => ..., 'idade' => ..., 'email' => ...]
    }
}