<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AuthMutator
{
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $credentials = Arr::only($args, ['email', 'password']);
        if (Auth::once($credentials)) {
            
            $token = Str::random(90);

            $user = auth()->user();
            $user->remember_token = $token;
            $user->save();

            return $token;
        }

        return null;
    }
}
