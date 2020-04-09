<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

    function test1() {
        $("#id1").load("kleinerQ68.php",function (text,status,xhttp) {
            console.log(text + ":" +status);
            //$("#id2").html(++text);
        });
    }

    $(document).ready(function () {

        //method= get
        $("#bt1").click(function () {

            $.get("kleinerQ68.php?max=100",function (data,status) {

                $("#id1").html(data + ":" +status);

            });


        });


        //methdd=post
        $("#bt2").click(function () {



            $.post("kleinerQ69.php",
                {max:100},
                function (data,status) {
                    $("#id3").html(data + ":" +status);

                });
        })


    });

</script>
<input type="button" onclick="test1()" value="sayHallo"/ >

<div id="id1"></div>
<div id="id2"></div>
<div id="id3"></div>
<button id="bt1">Click Me for GET</button>
<button id="bt2">Click Me for POST</button>