<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:40
 */

    if(isset($_GET)){
        echo "GET usuario <br>";
    }


    if(isset($_POST['*'])){
        echo "POST usuario <br>";
    }


    if(isset($_PUT["*"])){
        echo "PUT usuario <br>";
    }


    if(isset($_PATCH["*"])){
        echo "PATCH usuario <br>";
    }


    if(isset($_DELETE["*"])){
        echo "DELETE usuario <br>";
    }

?>