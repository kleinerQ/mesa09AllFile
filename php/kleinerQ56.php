<?php
include "MyOOTest2.php";

    class Bird{
        var $leg;
        public function setLag($leg){
            if($leg>=0 && $leg<=2){
                $this->leg=$leg;

            }else{
                $e = new Exception('error:leg');
                throw $e;
//                throw new Exception();
            }

        }


    }



    $bird =new Bird();
    try{
    $bird->setLag(3);
        echo  $bird ->leg;
    }catch(Exception $e){
        echo $e->getMessage();
        $bird->setLag(2);


    }