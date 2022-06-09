<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository extends BaseRepository {


    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function createUser(User $firstName, string $lastName, string $email){
        $body = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email
        ];
        return $this->post('user/create', $body);
    }

    public function updateUser(string $id, string $firstName, string $lastName){
        $body = [
            'firstName' => $firstName,
            'lastName' => $lastName
        ];
       
        return $this->put('user/' . $id, $body);
    }

    public function deletUser(string $id){
       
        return $this->delete('user/' . $id);
    }
}