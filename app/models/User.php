<?php

namespace App\Models;

use App\Model;
use App\MultiException;

class User extends Model implements HasEmail
{
    const TABLE = 'user';

    protected $id;

    protected $firstName;

    protected $lastName;

    protected $email;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @deprecated
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param mixed $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function fill($data = [])
    {
        $e = new MultiException();
        if (empty($data['firstName'])) {
            $e[] = new \Exception('First name неверный');
        } else {
            $this->setFirstName($data['firstName']);
        }
        if (empty($data['lastName'])) {
            $e[] = new \Exception('Last name неверный');
        } else {
            $this->setLastName($data['lastName']);
        }
        if (empty($data['email'])) {
            $e[] = new \Exception('Неверный адрес эл. почты');
        } else {
            $this->setEmail($data['email']);
        }
        if (empty($data['firstName']) || empty($data['lastName']) || empty($data['email'])) {
            throw $e;
        }
    }
}