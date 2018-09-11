<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:53
 */

include_once "conexao/Conexao.php";
include_once "repositories/SolicitacaoDao.php";

if(isset($_GET['id'])){
    $con = new Conexao();
    $solicitacaoDao = new SolicitacaoDao($con->getConexao());

    return $solicitacaoDao->solicitacaoFindAllByUserId($_GET['id']);
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