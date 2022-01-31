
<?php
$servidor = "localhost";
$utilizador = "root";
$password = "";
$basedados = "dibi";

//ligação com base nos parâmetros anteriores
$ligaBD = mysqli_connect ($servidor, $utilizador, $password,$basedados);

if(!$ligaBD){
	
	echo"Erro: Não foi possivel estabelecer ligação com o MySql";
	exit;
	
}




?>