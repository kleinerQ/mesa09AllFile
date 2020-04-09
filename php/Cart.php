<?php
class Cart{
    private $list; //array()

    function __construct()
    {
        $this->list=array();
    }

    function getItemNum($pid){
        if(isset($this->list["$pid"])){

            return $this->list["$pid"];

        }else{
            return '0' ;

        }

    }

    function addList($pid,$num){
        $this->list["{$pid}"]= $num;

    }
    function rmList($pid){
        unset($this->list["$pid"]);

    }

    function getList(){

        return $this->list;
    }
}