<?php

class User
{
    public function __construct($name, $age)
    {
        $this->__name = $name;
        $this->__age = $age;
    }
    public function login()
    {
        echo "user logged in";
    }
    public function say()
    {
        return [$this->__name, $this->__age];
    }
}

$user = new User('hit', 5);

print_r($user->say());
