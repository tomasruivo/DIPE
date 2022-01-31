<?php

// captar os dados da caixa de texto e procurar alunos na BD

require("ligaBD.php");




//captar dados do formulário
$pesquisa=$_GET["pesquisa"];

// inicio da ação sobre a BD

$procura="select *from aluno where nome like '%".$pesquisa."%'";
//$procura="select *from aluno where turma like '%".$pesquisa."%'";
//$procura="select *from aluno where ano like '%".$pesquisa."%'";



$faz_procura=mysqli_query($ligaBD,$procura);
$num_registos=mysqli_num_rows($faz_procura);


//verifica se existem registos

if($num_registos==0){
	echo"Não existem registos com esse Nome.";
	echo"<a href='pesquisar.php'> Voltar </a>";
	exit;
	
}

echo "Nº total de registos encontrados:".$num_registos;
?>
<table border="1">
<tr> <th> Nome</th><th> Idade</th><th> Turma</th><th> Ano</th><th>Email </th>
<!-- Editar dados-->
<th>Editar </th>
<!-- Apagar dados-->
<th>Apagar </th>
</tr>

<?php
for($i=0;$i<$num_registos;$i++){
	
	$registos=mysqli_fetch_array($faz_procura);
	echo"<tr>";
	
	echo'<td>'.$registos['nome'].'</td>';
	echo'<td>'.$registos['idade'].'</td>';
	echo'<td>'.$registos['turma'].'</td>';
	echo'<td>'.$registos['ano'].'</td>';
	echo'<td>'.$registos['email'].'</td>';
	// editar dados
	echo'<td><a href="editaluno.php?email='.$registos['email'].'">Editar </a></td>';
	echo'<td><a href="apagaluno.php?email='.$registos['email'].'">Apagar </a></td>';
	
	echo"</tr>";
}
?>
</table>