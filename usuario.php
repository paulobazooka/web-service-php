<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:40
 */

    include_once "model/Usuario.php";
    include_once "repositories/UsuarioDao.php";
    include_once "conexao/Conexao.php";


    if(isset($_GET)){
        $con = new Conexao();
        $usuarioDao = new UsuarioDao($con->getConexao());

        return $usuarioDao->usuarioFindAll();
    }


    if(isset($_POST['*'])){

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