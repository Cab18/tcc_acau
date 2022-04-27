<?php

include 'cadastro.html'

$n_social = $_POST['n_social'];
$rg = $_POST['rg'];
$senha = SHA1($_POST['senha']);
$connect = mysql_connect('host','acau','');
$db = mysql_select_db('acau');
$query_select = "SELECT n_social FROM aluno WHERE rg = '$rg'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$lrgarray = $array['rg'];

  if($rg == "" || $rg == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo rg deve ser preenchido');window.location.href='
    cadastro.html';</script>";

    }else{
      if($lrgarray == $rg){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.html';</script>";
        die();

      }else{
       $sql = "INSERT INTO
                    aluno(n_social, rg, senha)
                VALUES('" . mysql_real_escape_string($_POST['n_social']) . "',
                       '" . sha1($_POST['senha']) . "',
                       '" . mysql_real_escape_string($_POST['rg']) . "',
                        NOW(),
                        0)";
         $result = mysql_query($sql);
        if(!$result)
        {
            //algo deu errado
            echo 'Houve algo de errado com o cadastro tente novamente mais tarde.';
            echo mysql_error();
        }
        else
        {
            echo 'Cadastro realizado com sucesso. Agora pode realizar o login <a href="login.html">Login</a>';
        }
    }
}

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";

          if($n_social == "" || $n_social == null){
            echo"<script language='javascript' type='text/javascript'>
            alert('O campo nome social deve ser preenchido');window.location.href='
            cadastro.html';</script>";
            
      }
    }
?>
