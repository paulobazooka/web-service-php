<?php 
    include_once "model/Solicitacao.php";
    include_once "model/Usuario.php";
    include_once "conexao/Conexao.php";
    include_once "repositories/UsuarioDao.php";
    include_once "model/Mensagem.php";
?>

<?php 
    /*if(isset($_GET)){
        echo "<h5>Solicitação<h5>";
       
        $solicitacao = new Solicitacao("2018-01-01", -47.654, -27.6954, "Buraco", "Tem um buraco aqui na frente de casa", false);
        print_r($solicitacao);
        echo '<br><br>';

        $usuario = new Usuario("Paulo", "paulo@gmail");
        print_r($usuario);

        $con = new Conexao();
    }*/


 //   $mensagem = new Mensagem('teste', 'teste', 'teste');

   // $mensagem->enviarMensagem();


   echo "<h3>Web Service Olhar Cidadão</h3><br>";
   echo "<label>Autores:</label><br>";
   echo "<label>Lucas Dias</label><br>";
   echo "<label>Paulo Sérgio do Nascimento</label><br>";

?>