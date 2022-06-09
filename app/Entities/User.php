<?php

namespace App\Entities;

use Ci4Orm\Entities\Entity;

class User extends Entity {

    private ?string $id = null;
    private ?string $title = null;
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $email = null;
    private ?string $picture = null;

    /**
     *
     * @return string
     */
    public function getId(): string{
        return $this->id;
    }
    /**
     *
     * @param string $id
     * @return User
     */
    public function setId(string $id): User {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTitle(): string{
        return $this->title;
    }
    /**
     *
     * @param string $title
     * @return User
     */
    public function setTitle(string $title): User {
        $this->title = $title;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getFirstName(): string{
        return $this->firstName;
    }
    /**
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getLastName(): string{
        return $this->lastName;
    }
    /**
     *
     * @param string $firstName
     * @return User
     */
    public function setLastName(string $lastName): User {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getEmail(): string{
        return $this->email;
    }
    /**
     *
     * @param string $picture
     * @return User
     */
    public function setEmail(string $email): User {
        $this->email = $email;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getPicture(): string{
        return $this->picture;
    }
    /**
     *
     * @param string $picture
     * @return User
     */
    public function setPicture(string $picture): User {
        $this->picture = $picture;
        return $this;
    }

}