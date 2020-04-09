<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/5/9
 * Time: 上午9:18
 */


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            $('#showBox1').html(this.responseText);
        }
    };







    function test1() {
        var number=$("#number").val();
        // alert(number);
        xhttp.open('POST','kleinerQRandomPost.php',true);
        xhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
        xhttp.send('number=' + number);


    }



    function test2() {
        var number=$("#number").val();
        // alert(number);
        xhttp.open('GET','kleinerQRandomGet.php?number=' + number,true);

        xhttp.send();


    }

    function test3() {
        setInterval(function(){

            test1();
        },2000)

    }

    function test4(){
        setInterval(function () {
            xhttp.open('GET','kleinerQfrenquentAsking.php',true);
            xhttp.send();

        },1000)



    }

    function test5(){
        setInterval(function () {
            xhttp.open('GET','kleinerQfrenquentAskingChat.php',true);
            xhttp.send();

        },500)



    }

</script>


<input name="number" id="number"/><br/>
<input type="button" name="postbtn" value="POST" onclick="test1()"/><br/>
<input type="button" name="getbtn" value="GET" onclick="test2()"/><br/>
<input type="button" name="getbtn" value="FrequentQueryPOST" onclick="test3()"/><br/>
<input type="button" name="frqbtn" value="FrequentAskingEnable" onclick="test4()"/><br/>
<input type="button" name="chatbtn" value="FrequentAskingEnable2" onclick="test5()"/><br/>
<hr/>
<div id="showBox1"></div>
<hr/>
<div id="showBox2"></div>
