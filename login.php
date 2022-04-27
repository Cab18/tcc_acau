<?php
$id_aluno = $_POST['id_aluno'];
$senha = sha1($_POST['senha']);
$connect = mysql_connect('host','acau','');
$db = mysql_select_db('acau');
  if (isset($id_aluno)) {

    $verifica = mysql_query("SELECT * FROM alunos WHERE id_aluno =
    '$id_aluno' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Id e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else{
        setcookie("id_aluno",$id_aluno);
      }
  }
?>
