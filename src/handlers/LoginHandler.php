<?php

namespace src\handlers;

use src\models\User;

class LoginHandler
{

    public static function checkLogin()
    {

        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            if (count($data) > 0) {
//                dd($data);
//                exit();
                $loggedUser = new User(
                    $data["id"],
                    $data["email"],
                    $data["name"],
                    $data["avatar"]
                );
//                $loggedUser->id = ($data["id"]);
//                $loggedUser->email = ($data["email"]);
//                $loggedUser->name = ($data["name"]);

                return $loggedUser;
            }

        } else return false;
    }

    /**
     * @param string $email
     * @param string $password
     * @return string|bool
     */
    public static function verifyLogin(string $email, string $password)
    {
        if (empty($email) || empty($password)) {
            return false;
        }
        $user = User::select()
            ->where('email', $email)
            ->one();
        if ($user) {
            if (password_verify($password, $user["password"])) {
                $token = md5(time() . rand(0, 9999) . time());
                User::update()
                    ->set("token", $token)
                    ->where('email', $email)
                    ->execute();
                return $token;
            }
        }

        return false;
    }

    public static function emailExists($email): bool
    {
        $user = USer::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public static function addUser(string $name, string $email, string $password, string $birthdate)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time() . rand(0, 9999) . time());

        USer::insert([
            "email" => $email,
            "name" => $name,
            "password" => $hash,
            "birthdate" => $birthdate,
            "token" => $token
        ])->execute();

        return $token;
    }


}