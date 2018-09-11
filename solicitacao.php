<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:53
 */

include_once "model/Solicitacao.php";
include_once "conexao/Conexao.php";
include_once "repositories/SolicitacaoDao.php";

if(isset($_GET['id'])){
    $con = new Conexao();
    $solicitacaoDao = new SolicitacaoDao($con->getConexao());

    return $solicitacaoDao->solicitacaoFindAllByUserId($_GET['id']);
}


if(isset($_POST['*'])){
    echo "POST Solictação <br>";
    $con = new Conexao();
    $solicitacaoDao = new SolicitacaoDao($con->getConexao());

    $solicitacaoData = new Solicitacao($_POST['data'],$_POST['latitude'], $_POST['longitude'], $_POST['tipo'], $_POST['comentario'], $_POST['foisolucionado'], $_POST['userid']);

    return $solicitacaoDao->solicitacaoSave($solicitacaoData);
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
