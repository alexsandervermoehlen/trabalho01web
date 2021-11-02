<?php

function conexao() {
      $sHost = 'localhost';
      $sPort = '5432';
      $sDbName = 'trabalho1';
      $sUser = 'postgres';
      $sPassword = 'postgres';

      $sConexao = 'host =' . $sHost . ' port=' . $sPort . ' dbname=' . $sDbName . ' user=' . $sUser . ' password=' . $sPassword;

      return $oConexao = pg_connect($sConexao);
}

function criaConsulta($aArrayPopulado, $aCabecalho, $sPage) {
      if (!empty($aArrayPopulado)) {
            echo '<div id="consulta">';
            echo '<table class="tableconsulta">';   
            echo '<tr>';
            foreach ($aCabecalho as $value) {
                  echo '<th>' . $value . '</th>';
            }
            echo '</tr>';
            foreach ($aArrayPopulado as $i) { 
                  $iIndiceDelete = $i[0]; 
                  $iIndiceAlterar = $i[0]; 
                  echo '<tr>'; 
                  foreach ($i as $j) {
                        echo '<td>' . $j . '</td>';
                  }
        
                  echo '<td><a href="'.$sPage.'.php?pg=&delete=' . $iIndiceDelete . '">Deletar</a></td>';
                  echo '<td><a href="'.$sPage.'.php?pg=&alterar=' . $iIndiceAlterar . '">Alterar</a></td>';    
                  echo '</tr>'; 
            }
            echo '</table>';
            echo '</div>';
      } 
}

function validaCampos($aCampos) {
      $bCamposValidos = true;
      
      foreach ($aCampos as $sCampo) {
            if(!isset($_POST[$sCampo]) || empty($_POST[$sCampo])) {
                  $bCamposValidos = false;
            }
      }
      return $bCamposValidos;
}


function montaSelect($aValoresLista, $sName) {
      echo '<select name="' . $sName . '">';
      echo '<option value="selecione" disabled readonly selected>Selecione</option>';
      foreach ($aValoresLista as $i) {
            echo '<option value="' . $i[0] . '">' . $i[1] . '</option>';
      }
      echo '</select>';
}