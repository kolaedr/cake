<?php

namespace App\Http;

use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;

class UsersACLRepository implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        return \Auth::id();
    }

    /**
     * Get ACL rules list for user
     *
     * @return array
     */
    public function getRules(): array
    {
        if (\Auth::user()->isAdmin()) {
            return [
                ['disk' => 'images', 'path' => '*', 'access' => 2],
            ];
        }

        return [
            // ['disk' => 'images', 'path' => '/', 'access' => 1],                                  // main folder - read
            ['disk' => 'public', 'path' => 'users', 'access' => 1],                              // only read
            // ['disk' => 'images', 'path' => 'users/'. \Auth::user()->name, 'access' => 1],        // only read
            // ['disk' => 'images', 'path' => 'users/'. \Auth::user()->name .'/*', 'access' => 1],  // read and write
        ];
    }
}
