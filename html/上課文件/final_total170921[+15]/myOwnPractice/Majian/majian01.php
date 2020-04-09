<?php
for($i=0;$i<144;$i++){

    $pot[$i]=$i;
}
$randTime=10000;
for ($i=0; $i<$randTime;$i++){
    //隨機抽一張，都跟第一張換
    $randNumber=rand(0,143);
    $temp = $pot[0];
    $pot[0]=$pot[$randNumber];
    $pot[$randNumber]=$temp;

}




$player=array(array(),array(),array(),array());
$flowerNumberCounter=0;
// 每個人輪流一次拿4張，每個人各分別拿四次
for($i=0;$i<16;$i++){

    for($j=0;$j<4;$j++) {

        $player[$i % 4][] = $pot[$j+4*$i];
        //如果拿到花，從尾巴多抽一張
//            if ($pot[$j+4*$i] >= 136) {
//                $player[$i % 4][] = $pot[143 - $flowerNumberCounter];
//            }
    }
}
//開門
$player[0][]=$pot[64];

//補花
//
foreach($player as $playerIndex =>$eachPlayer){
    $playerFlowerCounter=0;
    foreach($eachPlayer as $handCard){
        if($handCard>=136){
//
          do {
              $player[$playerIndex][$playerFlowerCounter + count($player[$playerIndex])] = $pot[143 - $flowerNumberCounter];
              $checkFlag=$pot[143 - $flowerNumberCounter];
              $playerFlowerCounter += 1;
              $flowerNumberCounter++;
          }while($checkFlag >= 136);
        }

    }

}

//補花
//    foreach($player as $value){
//
//        foreach($value as $key => $handCard){
//            echo "$key => $handCard <br>";
//
//        }
//
//    }

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<table border="1">

    <?php
    foreach($player as $eachPlayer) {
        echo "<tr>";
        sort($eachPlayer);
        foreach ($eachPlayer as $handCard) {

            if($handCard<36){
                //0-35萬子
                $cardString=(int)($handCard/4)+1;
                echo "<td style=\"width:45px\">{$cardString}萬</td>";

            }else if($handCard<72){
                //36-71 條子
                $cardString=(int)(($handCard-36)/4)+1;
                echo "<td style=\"width:45px\">{$cardString}條</td>";
            }else if($handCard<108){
                //72-107 筒子
                $cardString=(int)(($handCard-72)/4)+1;
                echo "<td style=\"width:45px\">{$cardString}筒</td>";
            }else if($handCard<112){
                //108-111 中
                echo "<td style=\"width:45px;color:red;\">中</td>";
            }else if($handCard<116){
                //112-115 發
                echo "<td style=\"width:45px;color:green;\">發</td>";
            }else if($handCard<120){
                //116-119 白
                echo "<td style=\"width:45px;color:blue;\">白</td>";
            }else if($handCard<124){
                //120-123 東
                echo "<td style=\"width:45px;font-weight: bold;\">東</td>";
            }else if($handCard<128){
                //124-127 南
                echo "<td style=\"width:45px;font-weight: bold;\">南</td>";
            }else if($handCard<132){
                //128-131 西
                echo "<td style=\"width:45px;font-weight: bold;\">西</td>";
            }else if($handCard<136){
                //132-135 北
                echo "<td style=\"width:45px;font-weight: bold;\">北</td>";
            }else{
                switch($handCard){
                    case 136:
                        //梅
                        echo "<td style=\"width:45px;color:lightseagreen;font-weight: bold;\">梅</td>";
                        break;

                    case 137:
                        //蘭
                        echo "<td style=\"width:45px;color:lightseagreen;font-weight: bold;\">蘭</td>";
                        break;

                    case 138:
                        //竹
                        echo "<td style=\"width:45px;color:lightseagreen;font-weight: bold;\">竹</td>";
                        break;

                    case 139:
                        //菊
                        echo "<td style=\"width:45px;color:lightseagreen;font-weight: bold;\">菊</td>";
                        break;

                    case 140:
                        //春
                        echo "<td style=\"width:45px;color:lightseagreen;font-weight: bold;\">春</td>";
                        break;

                    case 141:
                        //夏
                        echo "<td style=\"width:45px;color:lightseagreen;font-weight: bold;\">夏</td>";
                        break;

                    case 142:
                        //秋
                        echo "<td style=\"width:45px;color:lightseagreen;font-weight: bold;\">秋</td>";
                        break;

                    case 143:
                        //冬
                        echo "<td style=\"width:45px;color:lightseagreen;font-weight: bold;\">冬</td>";
                        break;

                    default:
                        echo "XX";

                        break;




                }



            }


//                echo "<td style=\"width:50px\">$handCard<br></td>";
        }
        echo "</tr>";
    }
    ?>


</table>
進行到莊家開門補完花
<!---->
<?php
//foreach($pot as $value){
//
//    echo "$value<br>";
//
//}
//?>
