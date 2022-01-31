<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head> <title> Remover </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body> <h2> Remover registo </h2>
<?php
$nomrem = $_POST['nome'];
if (!$nomrem)
 {echo 'Volte atrás e escreva o nome.'; exit;}
echo 'Nome a remover: '.$nomrem. '<p>';
$ligax = mysqli_connect('localhost', 'root','');
if (!$ligax){echo '<p>Falha na ligação.'; exit; }
mysqli_select_db($ligax, 'dibi');
$consulta = "Select * From publicacao";
$result = mysqli_query($ligax, $consulta);
$nr_antes = mysqli_num_rows($result);
$remove = "delete from publicacao where nome = '".$nomrem."'";
$result = mysqli_query($ligax, $remove);
if ($result==0) echo "<p>Não removido<br>";
$consulta = "Select * From publicacao";
$result = mysqli_query($ligax, $consulta);
$nr_depois = mysqli_num_rows($result);
$nr_removidos = $nr_antes - $nr_depois;
echo 'Nº de registos removidos: '.$nr_removidos;
?> <p> <a href="listar.php"> Listar registos </a>
</body> </html>