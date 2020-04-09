<?php


    class Product{
        private $editid,$id,$pname,$price,$qty;

        function __construct($id)
        {

            $this->id=$id;
        }
        function __get($name)
        {
            // TODO: Implement __get() method
            return $this->$name;


        }

        function __set($name, $value)
        {
            // TODO: Implement __set() method.
            $this->$name=$value;
            if($name='editid'){
                $this->id=$value;
            }
        }

    }