<?php
class MyQuery{
    var $mysqli;
    const QUERY_PID=0;
    const QUERY_PNAME=1;
    const QUERY_PRICE=2;
    const QUERY_QTY=3;

    function __construct($mysqli){
        $this->mysqli=$mysqli;
    }

    function getPinfo($pid,$field){
        $sql="select * from product where id=$pid";
        $result = $this->mysqli->query($sql);
        if($result->num_rows ==0){
            return false;

        }else{

            $data =$result->fetch_assoc();
            switch($field){

                case self::QUERY_PID: return $data['id'];
                case self::QUERY_PNAME: return $data['pname'];
                case self::QUERY_PRICE: return $data['price'];
                case self::QUERY_QTY: return $data['qty'];

            }


        }


    }


}