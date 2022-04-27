<?php

/* Credenciais do banco
( no servidor local) com configuração padrão 
 */

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','ACAU');

/**conexão com o banco */

try{

$pdo = new PDO("mysql:host". DB_SERVER. ";dbname=". ACAU,root,);
//modo de erro pdo para excecao:
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPION);

} catch (PDOExcepetion $e){

    die("ERROR: Não foi possível conectar." . $e->getMessage());


