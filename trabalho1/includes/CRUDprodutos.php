<?php

function getProdutos() {
      $oConexao = conexao(); 
      $sSelect = 'SELECT * FROM public.produtos';
      $oResultado = pg_query($oConexao, $sSelect);
      $aProdutos = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aProdutos, $aResultado);
      }
      pg_close($oConexao);
      return $aProdutos;
}

function getCabecalhoConsultaProdutos() {
      return ['Código', 'Nome','Preço Unitário', 'Unidade em Estoque',
              'Deletar', 'Alterar'];
}

function deleteProduto($iCodigo) {
      $oConexao = conexao();
      $sDelete = 'DELETE FROM public.produtos
                  WHERE procodigo = (\'' . $iCodigo . '\')';
      if (@pg_query($oConexao, $sDelete)) {
            echo '<br>';
            echo 'Produto deletado com sucesso!';
      } 
      pg_close($oConexao);
}

function insertProduto() {
      $oConexao = conexao();
      $sInsert = 'INSERT INTO public.produtos(pronome, proprecounitario, proundestoque)
                  VALUES (\'' . $_POST['proNomeProduto'] . '\', 
                          \'' . $_POST['proPrecoUnitario'] . '\',
                          \'' . $_POST['proUndEstoque'] . '\')';
      if (@pg_query($oConexao, $sInsert)) {
            echo 'Produto cadastrado com sucesso!'; 
      } else {
            echo '<br>';
            echo $sInsert;
            echo 'Não foi possível inserir o produto. Tente novamente!';
      }
      pg_close($oConexao);
}

function updateProduto($iCodigo) {
      $oConexao = conexao();
      $sUpdate = 'UPDATE public.produtos 
                     SET pronome = \'' . $_POST['upProNomeProduto'] . '\''. ', 
                         proprecounitario = \'' . $_POST['upProPrecoUnitario']. '\''. ', 
                         proundestoque = \'' . $_POST['upProUndEstoque']. '\''. '';

      @pg_query($oConexao, $sUpdate);
      pg_close($oConexao);
      header("Location: produtos.php");
}

function selectUpdateProduto($iCodigo) {
      $oConexao = conexao();
      $sSelect = 'SELECT * FROM public.produtos WHERE procodigo = \'' . $iCodigo . '\'';
      $oResultado = pg_query($oConexao, $sSelect);
      $aProdutos = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {
            array_push($aProdutos, $aResultado);
      }
      pg_close($oConexao);
      return $aProdutos;
}
