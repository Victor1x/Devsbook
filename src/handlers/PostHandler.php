<?php

namespace src\handlers;

use src\models\Post;
use src\models\User;
use src\models\Relation;

class PostHandler
{

    public static function addPost($idUser, $type, $body)
    {
        $body = trim($body);
        if (!empty($idUser) && !empty($body)) {
            Post::insert([
                "id_user" => $idUser,
                "type" => $type,
                "created_at" => date('Y-m-d H:i:s'),
                "body" => $body
            ])->execute();


        }

    }

    public static function getHomeFeed($idUser)
    {
        $usersList = Relation::select()->where("user_from", $idUser)->get();

        $users = [];

        foreach ($usersList as $userItem) {
            $users[] = $userItem["user_to"];
        }
        $users[] = $idUser;

        $postList = Post::select()
            ->where("id_user", "in", $users)
            ->orderBy("created_at", "DESC")
            ->get();

        $posts = [];
        foreach ($postList as $postItem) {
            $newUser = User::select()->where("id", $postItem["id_user"])->get();

            $posts[] = new Post(
                $postItem["id"],
                new User(
                    $newUser[0]["id"],
                    $newUser[0]["email"],
                    $newUser[0]["name"],
                    $newUser[0]["avatar"]
                ),
                $postItem["type"],
                $postItem["created_at"],
                $postItem["body"]
            );
        }
        return $posts;
    }


}

