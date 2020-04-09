<?php

class ProductInfoQuery{

    var $mysqli;
    const QUERY_PID=1;
    const QUERY_PNAME=2;
    const QUERY_PRICE=3;
    const QUERY_QTY=4;

    function __construct($mysqli){

        $this->mysqli=$mysqli;

    }

    function queryItem($pid,$field){


        $sql="select * from product where id={$pid}";
        $result=$this->mysqli->query($sql);
//        return 'aaa';

        if($result->num_rows <0 ){
            return false;
        }else{
            $data=$result->fetch_assoc();
            switch($field){
                case self::QUERY_PID: return $data['id'];
                case self::QUERY_PNAME: return $data['pname'];
                case self::QUERY_PRICE: return $data['price'];
                case self::QUERY_QTYs: return $data['qty'];



            }

        }


    }

}