<?php
class UserQueryData{
    private $userQueryStart,$userQueryDest,$userQueryTime;


    function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name=$value;
    }

    function __get($name)
    {
        return $this->$name;
        // TODO: Implement __get() method.
    }

}