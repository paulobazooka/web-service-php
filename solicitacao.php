<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:53
 */

if(isset($_GET)){
    echo "GET Solictação <br>";
}


if(isset($_POST['*'])){
    echo "POST Solictação <br>";
}


if(isset($_PUT["*"])){
    echo "PUT Solictação <br>";
}


if(isset($_PATCH["*"])){
    echo "PATCH Solictação <br>";
}


if(isset($_DELETE["*"])){
    echo "DELETE Solictação <br>";
}

?>