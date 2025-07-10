<?php

namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;
use src\handlers\PostHandler;
use src\models\Post;

class PostCotroller extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if (!$this->loggedUser) {
            $this->redirect("/login");
        };
    }

    public function newPostAction()
    {
//        $this->redirect('/');
        $body = filter_input(INPUT_POST, 'body');
        if ($body) {
            PostHandler::addPost(
                $this->loggedUser->toArray()["id"],
                "text",
                $body);
        }
        $this->redirect("/");
    }

}
