<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository extends BaseRepository {


    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function createUser(User $user){
        $body = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail()
        ];
        return $this->post('user/create', $body);
    }

    public function updateUser(User $user){
        $body = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
        ];
       
        return $this->put('user/' . $user->getId(), $body);
    }

    public function deletUser(string $id){
       
        return $this->delete('user/' . $id());
    }
}