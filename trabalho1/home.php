<?php
session_start();
if (isset($_SESSION['usucodigo'])) {
    ?>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Menu</title>
            <link rel="stylesheet" type="text/css" href="css/css.css" />
        </head>
        <body>
            <div id="menu">
                <ul>
                    <li><a href="produtos.php">Produtos</a></li>
                </ul>
            </div>
        </body>

        <footer id="rodape">
            <?php
                echo '<h3 style="color: white;">Login realizado com sucesso! Bem vindo, ' . $_SESSION['usunome'] . '!</h3>';
            ?> 
        </footer>
    </html>
    <?php
} else {
    echo 'Você não tem permissão para acessar essa página! Realize o <a href="login.php">Login</a>!';
}



