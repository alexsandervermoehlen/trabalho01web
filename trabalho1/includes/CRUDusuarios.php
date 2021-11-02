<?php

function usuarioLogin($sLogin, $sSenha) {
      $oConexao = conexao();
      $sSelect = 'select * from public.usuarios where usulogin = \''. $sLogin . '\' and ususenha = \''. md5($sSenha) . '\'';
      $oResultado = pg_query($oConexao, $sSelect);
      $aUsuario = [];
      while ($aResultado = pg_fetch_array($oResultado, null, PGSQL_NUM)) {                     
            array_push($aUsuario, $aResultado);
      }
      pg_close($oConexao);
      return $aUsuario;
}


