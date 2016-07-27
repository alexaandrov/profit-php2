<?php

namespace App\Tests;

use App\Models\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $users;

    public function __construct()
    {
        $this->users = new User();
    }

    public function testFindAllUsers()
    {
        assert(! empty($this->users->findAll()));
    }

    public function testFindByIdUser()
    {
        assert(! empty($this->users->findById(1)));
    }
}
