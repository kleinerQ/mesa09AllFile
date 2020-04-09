
<script>

    var xhttp= new XMLHttpRequest();
    // if(xhttp){
    //     alert('OK');
    //
    // }else{
    //     alert('XX');
    // }

    xhttp.onreadystatechange  = function () {
        // var here=document.getElementById("here");
        // here.innerHTML="OK";

        if(xhttp.readyState==4 && xhttp.status==200){

            var ret=xhttp.responseText;
            // for(var i =0; i<ret.length;i++){
            //     alert(ret.substr(i,1));
            //
            // }

            if(ret.substr(0,3)=='num'){

                document.getElementById('num').innerHTML=ret.substr(4);
            }else{
                // alert();
                document.getElementById("here").innerHTML=xhttp.responseText;


            }


        }

       // switch(xhttp.readyState) {
       //     case 0:
       //         document.getElementById("here0").innerHTML = 'OK';
       //         break;
       //     case 1:
       //         document.getElementById("here1").innerHTML = 'OK';
       //         break;
       //     case 2:
       //         document.getElementById("here2").innerHTML = 'OK';
       //         break;
       //     case 3:
       //         document.getElementById("here3").innerHTML = 'OK';
       //         break;
       //     case 4:
       //         document.getElementById("here4").innerHTML = 'OK' + xhttp.status;
       //
       //         document.getElementById("here").innerHTML=xhttp.responseText;
       //         break;
       //
       // }


    }

    function test1() {
        var max=document.getElementById('max').value;

        xhttp.open('GET','kleinerQ68.php?max=' +max,true);
        xhttp.send();
    }

    function test2() {
        var max=document.getElementById('max').value;

        xhttp.open('POST','kleinerQ69.php',true);
        xhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
        xhttp.send('max='+max);
    }


    function test3() {
        setInterval(test1,3000);

    }


    //keep getting data

    setInterval(function () {
        xhttp.open('GET','kleinerQ70.php',true);
        xhttp.send();

    },1000)

</script>
<input type="number" id="max"/><br>
<input type="button" onclick="test1()" value="test1(GET)"/><br>
<input type="button" onclick="test2()" value="test2(POST)"/><br>
<input type="button" onclick="test3()" value="test3"/><br>
<!--0:<span id="here0"></span><br />-->
<!--1:<span id="here1"></span><br />-->
<!--2:<span id="here2"></span><br />-->
<!--3:<span id="here3"></span><br />-->
<!--4:<span id="here4"></span><br />-->
<hr/>
<div id="here"></div>

<hr/>
<div id="num"></div>

