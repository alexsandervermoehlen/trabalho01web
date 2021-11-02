<?php
require_once 'includes/estrutura.php';
require_once 'includes/CRUDProdutos.php';

session_start();
if (isset($_SESSION['usucodigo'])) {
    
?>
<!DOCTYPE html>

<html>
      <head>
            <title>Cadastro - Produtos</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/css.css" />
      </head>
      <body>
            <?php
                if (isset($_GET['alterar'])) {
                    $iCodigo = $_GET['alterar'];
                    $aProduto = selectUpdateProduto($iCodigo);

                    echo '<div id="tamanhoDivTabela">';
                    echo '<form action="?pg=&alterar=' . $iCodigo . '" method="POST">';
                    echo '<table class="tbGeral">';
                    echo '<tr>';
                    echo '<td class="titulonomeTab" colspan="2">Alterar Produto '.$iCodigo .'-'. $aProduto[0][1]. '</td>';
                    echo '</tr> ';
                    echo '<tr>';
                    echo '<th class="tituloTab">';
                    echo '<label for="upCatNome">Nome: </label>';
                    echo '</th>';
                    echo '<td class="colunaTab">';
                    echo '<input type="text" name="upProNomeProduto" value="'.$aProduto[0][1].'" maxlength="15">';
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th class="tituloTab">';
                    echo '<label for="upProQtdUnidade">Quantidade: </label>';
                    echo '</th>';
                    echo '<td class="colunaTab">';
                    echo '<input type="number" value="'.$aProduto[0][2].'" name="upProQtdUnidade">';
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<tr>';
                    echo '<th class="tituloTab">';
                    echo '<label for="upProPrecoUnitario">Preço Unitário: </label>';
                    echo '</th>';
                    echo '<td class="colunaTab">';
                    echo '<input type="number" value="'.$aProduto[0][3].'" name="upProPrecoUnitario">';
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<tr>';
                    echo '<td><input type="submit" class="buttonSubmit" name="buttonSubmit" value="Alterar"></td>';
                    echo '<td><input type="reset" class="buttonReset" name="buttonReset" value="Limpar"></td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</form>';    
                    echo '</div>';

                    if (validaCampos(['upProNomeProduto', 'upProPrecoUnitario', 'upProUndEstoque'])) {
                        updateProduto($iCodigo);
                    }
                } else {
                    ?>
                    <div id="tamanhoDivTabela">
                        <form method="POST" action="produtos.php">
                            <table class="tbGeral">
                                <tr>
                                    <td class="titulonomeTab" colspan="3">Cadastrar Produtos</td>
                                </tr>  
                                <tr>
                                    <th class="tituloTab">
                                            <label for="proNomeProduto">Nome: </label>
                                    </th>
                                    <td class="colunaTab" colspan="2">
                                            <input type="text" name="proNomeProduto"  maxlength="40">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tituloTab">
                                            <label for="proQtdUnidade">Quantidade por Unidade: </label>
                                    </th>
                                    <td class="colunaTab" colspan="2">
                                            <input type="number" name="proQtdUnidade"  maxlength="20">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="tituloTab">
                                            <label for="proPrecoUnitario">Preço Unitário: </label>
                                    </th>
                                    <td class="colunaTab" colspan="2">
                                            <input type="number" name="proPrecoUnitario"  maxlength="16">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="buttonSubmit" name="buttonSubmit" value="Cadastrar"></td>
                                    <td><input type="reset" class="buttonReset" name="buttonReset" value="Limpar"></td>
                                    <td><a href="home.php" id="voltarHome">Home</a></td>
                                </tr>
                            </table>
                        </form> 
                    </div>
                    <?php
                }
            ?>
      </body>
</html>
<?php 
    if (validaCampos(['proNomeProduto',  'proPrecoUnitario',
                        'proUndEstoque'])) {
        insertProduto();
    } 

    if (!empty($_GET['delete'])) {
        deleteProduto($_GET['delete']);
    }

    criaConsulta(getProdutos(), getCabecalhoConsultaProdutos(), 'produtos');
} else {
    echo 'Você não tem permissão para acessar essa página! Realize o <a href="login.php">Login</a>!';
}