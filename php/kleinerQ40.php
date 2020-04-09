<?php
    if(isset($_REQUEST['filename']) && $cont = $_REQUEST['cont']){

        $filename=$_REQUEST['filename'];
        $cont = $_REQUEST['cont'];

        $fp = fopen("test3/$filename", 'w');
        fwrite($fp,$cont);
        fclose($fp);
        header("Location: test3/{$filename}");
    }


?>