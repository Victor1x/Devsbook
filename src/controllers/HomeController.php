<?php

namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;
use src\handlers\PostHandler;

class  HomeController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if (!$this->loggedUser) {
            $this->redirect("/login");
        };
    }

    public function index()
    {
        $feeds = PostHandler::getHomeFeed(
            $this->loggedUser->toArray()['id']
        );

        $this->render('home', [
            "loggedUser" => $this->loggedUser,
            "feeds" => $feeds
        ]);
    }

}