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
        $query = "INSERT INTO aluno(n_social,rg,senha) VALUES ('$n_social','$rg','$senha')";
        $insert = mysql_query($query,$connect);

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
