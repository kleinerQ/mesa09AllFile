<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/5/2
 * Time: 下午2:15
 */

class Bike
{
    public $speed;  // 範圍只在裡面外面沒辦法存取 只能靠方法修改屬性  物件等級的屬性
    const var1 = 123; // give value as init the parameter;
    static $counter=0; //類別等級的屬性


    //建構式 建構方法 建構子 只被“父輩”呼叫一次
    public function __construct($initSpeed = 0)
    {

        $this->speed = $initSpeed;
        self::$counter++;                     //類別屬性的呼叫
//        echo 'Parent:__construct<br>';
    }

    public function upSpeed(){
        $this->speed = $this->speed<1 ? 1 : $this->speed*1.2;
    }

    public function downSpeed(){

        $this->speed = $this->speed<1 ? 0 : $this->speed*0.7;

    }

    public function getSpeed(){
        return $this->speed;
    }
}

    class Scooter extends Bike{
        public $gear=1;

        //construction if
        function __construct(int $initSpeed = 0)
        {
            parent::__construct($initSpeed);
            echo 'self:__construct<br>';
        }

        //Override
        function upSpeed($gear =1)
        {
            parent::upSpeed(); // TODO: Change the autogenerated stub
            $this->gear=$gear;
            $this->speed *=1.7*$this->gear;
        }


    }

    class People{

        public $bike;
        public function setBike(){
            $this->bike =new Bike();

        }

//    public function upSpeedFromBike(){
//        $this->bike->upSpeed();
//
//    }
//
//    public function downSpeedFromBike(){
//        $this->bike->downSpeed();
//
//    }
//    public function displaySpeedFromBike(){
//        return $this->bike->getSpeed();
//
//    }

}


class TWId  {
    private $id;
    private static $letterString='ABCDEFGHJKLMNPQRSTUVXYWZIO';
    private static $locationMatrix=array('臺北市' ,
                                    '臺中市' ,
                                    '基隆市' ,
                                    '臺南市' ,
                                    '高雄市' ,
                                    '新北市' ,
                                    '宜蘭縣' ,
                                    '桃園市' ,
                                    '新竹縣' ,
                                    '苗栗縣' ,
                                    '臺中縣' ,
                                    '南投縣' ,
                                    '彰化縣' ,
                                    '雲林縣' ,
                                    '嘉義縣' ,
                                    '臺南縣' ,
                                    '高雄縣' ,
                                    '屏東縣' ,
                                    '花蓮縣' ,
                                    '臺東縣' ,
                                    '澎湖縣',
                                    '陽明山管理局' ,
                                    '金門縣' ,
                                    '連江縣' ,
                                    '嘉義市' ,
                                    '新竹市' );
    public function __construct($id='', $gender=true, $area=-1){

        if(strlen($id) !=0){
            if(self::checkId($id)=='true') {
                //valid Id
                $this->id = $id;
            }else{
                //otherwise

                //echo'Not Valid ID';
                throw new Exception('Error Id');
            }
        }else{
            $area = $area==-1 ? rand(0,25):$area;
            $this->createNewId($gender,$area);
        }

    }

    private function createNewId($gender,$area){
        $id = substr(self::$letterString,$area,1);
        $id .= $gender?'1':'2';
        for($i=0;$i<7;$i++){

            $id .=rand(0,9);

        }

        for($i=0;$i<10;$i++){
            if (self::checkId($id . $i)=='true'){

                $this->id = $id . $i;
                break;

            }

        }

    }


    public static function checkId($id){

        if(preg_match('/^[A-Z][1,2][0-9]{8}$/',$id)){

            $n12=strpos(self::$letterString,substr($id,0,1)) + 10;
            $n1=(int)($n12/10);
            $n2=$n12%10;
            $n3=substr($id,1,1);
            $n4=substr($id,2,1);
            $n5=substr($id,3,1);
            $n6=substr($id,4,1);
            $n7=substr($id,5,1);
            $n8=substr($id,6,1);
            $n9=substr($id,7,1);
            $n10=substr($id,8,1);
            $n11=substr($id,9,1);
            $sum = 1*$n1 + 9*$n2 + 8*$n3 + 7*$n4 + 6*$n5 + 5*$n6 + 4*$n7 + 3*$n8 + 2*$n9 + 1*$n10 + 1*$n11;
            if ($sum %10 ==0){
                return 'true';
            }else{
                return 'false';
            }



        }else{
            return 'false';

        }

    }


    public function getGender(){
        if(substr($this->id,1,1)==1){
            return 'Male';
        }else{
            return 'Female';
        }

    }
    public function getArea(){
        return self::$locationMatrix[strpos(self::$letterString,substr($this->id,0,1))];

    }

    public function getId(){
        return $this->id;
    }

}


class Member {
    private $id,$name,$age, $gender;

    function __construct($id)
    {
        $this->id = $id;
    }

    function __get($fname) //if $fname ='id'
    {
        return $this->$fname; // $this->id
    }

    function __set($fname, $value)
    {
        if($fname != 'id') {
            $this->$fname = $value;
        }
    }

}