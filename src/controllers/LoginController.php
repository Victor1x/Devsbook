<?php

namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller
{
    public function login()
    {
//dd($_SESSION['token']);

        if (!empty($_SESSION['token'])) {
            $this->redirect('/');
        } else {
            $flash = '';
            if (!empty($_SESSION['flash'])) {
                $flash = $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }
            $this->render('login', ["flash" => $flash]);
        }

    }

    public function loginAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        if ($email && $password) {
            $token = LoginHandler::verifyLogin($email, $password); // metodo static  para verifica se usuario tem login, sem gera um token se nao volta o false
            if ($token) {
                $_SESSION['token'] = $token;
                $this->redirect("/");
            } else {
                $_SESSION['flash'] = 'Email ou Password incorrecte';
                $this->redirect("/login");
            }

        } else {
            $_SESSION['flash'] = 'Digiteos os capmos de Email ou Passowrd';
            $this->redirect("/login");
        }
    }

    public function cadastro()
    {
        if (!empty($_SESSION['token'])) {
            $this->redirect('/');
        } else {
            $flash = '';
            if (!empty($_SESSION['flash'])) {
                $flash = $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }
            $this->render('cadastro', ["flash" => $flash]);
        }
    }

    public function cadastroAction()
    {

        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $birthdate = filter_input(INPUT_POST, 'birthdate');

        if ($name && $email && $password && $birthdate) {
            $birthdate = explode("/", $birthdate);

            if (count($birthdate) != 3) {
                $_SESSION["flash"] = "Data de nascimento invalida";
                $this->redirect("/cadastro");
            }

            $birthdate = $birthdate[2] . "-" . $birthdate[1] . "-" . $birthdate[0];

            if (!strtotime($birthdate)) {
                $_SESSION["flash"] = "Data de nascimento invalida  ";
                $this->redirect("/cadastro");
            }

            if (!LoginHandler::emailExists($email)) {
                $token = LoginHandler::addUser($name, $email, $password, $birthdate);
                $_SESSION['token'] = $token;
                $this->redirect("/");
            } else {
                $_SESSION["flash"] = "Email já cadastrado";
                $this->redirect("/cadastro");
            }

        } else {
            $_SESSION['flash'] = 'Os campos estão vazios ,Zé Ruela';
            $this->redirect("/cadastro");
        }
    }
}