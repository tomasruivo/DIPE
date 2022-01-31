<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> <head> <title>Mostrar</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body> <h3>Mostrar nome procurado</h3>
<?php
$nomeproc = $_POST['nome'];
if (!$nomeproc)
 {echo 'Volte atrás e escreva o nome.'; exit;}
echo '<p>Nome procurado: '.$nomeproc. '<p>';
$ligax = mysqli_connect('localhost', 'root','');
if (!$ligax){echo '<p> Falha na ligação.'; exit; }
mysqli_select_db($ligax, 'dibi');
$procura = "Select * From publicacao
 where nome like '%".$nomeproc."%'";
$result = mysqli_query($ligax, $procura);
$nregistos = mysqli_num_rows($result);
echo 'Nº de registos encontrados: '.$nregistos;
?>
<table border="1">
<tr><td> id_publicar: <td> Nome: <td> area do projeto: <td> objetivo: <td> publico:  </tr>
<?php
for ($i=0; $i <$nregistos; $i++) {
$registo = mysqli_fetch_assoc($result);
echo '<tr> <td>'.$registo['id_publicar'].'</td> <td>'.$registo['Nome'].'</td> <td>' .$registo['areaprojeto'].'</td><td>' .$registo['objetivo'].'</td><td>' .$registo['publico'].'</td> </tr>'; }?>
</table>
<p> <a href="listar.php"> Listar registos </a>
<form action="remover.php" method="post">
<p>Para apagar um registo, escreva aqui o nome</p>
<input type="text" name="nome">
<input type="submit" value="Apagar registo">
</form></body>
</html>