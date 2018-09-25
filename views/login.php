<?php


?>


<!DOCTYPE html>
<html>
    <head>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <!-- Custom css !-->
        <link rel="stylesheet" href="./css/login.css">
    </head>
    <body>
         <nav class="grey darken-4">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Olhar Cidadão</a>
            </div>
        </nav>

         <form action="home.php" method="post">
            <div class="content row login-body">
                <div class="col s4 offset-s4">
                    <label>Nome de Usuário</label>
                    <input type="text" name="usrName" required/>
                    <br>
                    <label>Senha</label>
                    <input type="password" name="password" required/>
                    <br>
                    <div id="loginBtns" class="col s12">
                        <div class="col s6">
                            <button class="waves-effect waves-light btn grey darken-4">
                                Cadastrar
                            </button>
                        </div>
                        <div class="col s6">
                            <button class="waves-effect waves-light btn grey darken-4" type="submit">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
         </form>
    </body>
</html>
