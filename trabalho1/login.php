<!DOCTYPE html>
<html>
      <body>
       
            <?php
                  require_once 'includes/estrutura.php';
                  require_once 'includes/CRUDUsuarios.php';
            ?>
                  <form method="POST" name="login">
                        <input type="text" maxlength="60" placeholder="Digite seu login" name="userlogin" id="userlogin">
                        <br>
                        <input type="password" maxlength="20" placeholder="Digite sua senha" name="password" id="password">
                        <br>
                        <input type="submit" value="Entrar">
                  </form>
            <?php
                  if (isset($_POST['userlogin']) && isset($_POST['password'])) {
                    
                        $sLogin = $_POST['userlogin'];
                        $sSenha = $_POST['password'];

                        $aUsuarios = usuarioLogin($sLogin, $sSenha);
                   
                        if (!empty($aUsuarios)) {
                              if ($aUsuarios[0][1] === $sLogin && $aUsuarios[0][2] === md5($sSenha)) {                         
                                    session_start();
                                    $_SESSION['usucodigo'] = $aUsuarios[0][0];
                                    $_SESSION['usunome'] = $aUsuarios[0][1];
                                    header("Location: home.php");
                              }
                        } else {
                              echo '<br>';
                              echo 'Usuário não encontrado';
                        }
                  } 
                  ?>
            </div>      
      </body>
</html>
