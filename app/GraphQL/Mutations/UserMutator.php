<?php

namespace App\GraphQL\Mutations;

class UserMutator
{
    public function create($root, array $args)
    {
        $user= new \App\Models\User($args);
        $user->save();
        return [
            'user'=> $user
        ];
    }

}
