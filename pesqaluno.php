<html>
<!DOCTYPE HTML>
<!--
	ZeroFour by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>PsqDeIdeias</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="right-sidebar is-preload">
		<div id="page-wrapper">
			
			<!-- Header Wrapper -->
				<div id="header-wrapper">
					<div class="container">

						<!-- Header -->
							<header id="header">
								<div class="inner">

									<!-- Logo -->
										<h1><a href="DIBI-ProjetoPAP.html" id="logo">DIPI</a></h1>

									<!-- Nav -->
										<nav id="nav">
											<ul>
												<li><a href="entrar.html">Publicação de ideias</a></li>	<li>
													<a href="pesquisar.php">procura de ideias</a>
													<ul>
														<li><a href="#">Informatica</a></li>
														<li><a href="#">animais</a></li>
														<li>
															<a href="pesquisar.php">outros</a>
															<ul>
																<li><a href="#">informatica</a></li>
																<li><a href="#">Animais</a></li>
																<li><a href="#">reciclagem</a></li>
																<li><a href="#">Ideias a nivel de mercado de trabalho </a></li>
															</ul>
														</li>
														<li><a href="#">Veroeros feugiat</a></li>
													</ul>
												</li>
												<li><a href="sobrenoss.html">Sobre nós</a></li>
												<li class="current_page_item"><a href="#">Idioma</a>
                                                <ul>
														<li><a href="DIBI-ProjetoPAP.html">Português</a></li>
														<li><a href="DIBI-ProjetoPAP2ing.html">Inglês</a></li>
													</ul>
                                                </li>
												<li><a href="login.php">Conta</a></li>
											</ul>
										</nav>

								</div>
							</header>

					</div>
	</div>
<head>
</head>
<div class="wrapper style3">
						<div class="inner">
							<div class="container">
								<div class="row">
									<div class="col-8 col-12-medium">
                                    
<?php

// captar os dados da caixa de texto e procurar alunos na BD

require("ligaBD.php");




//captar dados do formulário
$pesquisa=$_GET["pesquisa"];

// inicio da ação sobre a BD

$procura="select * from publicacao where nome like '%".$pesquisa."%'";
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
<tr> <th style="color:#000"> id_publicar</th><th style="color:#000"> Nome</th><th style="color:#000"> areaprojeto</th><th style="color:#000"> objetivo</th><th style="color:#000">publico </th>

</tr>

<?php
for($i=0;$i<$num_registos;$i++){
	
	$registos=mysqli_fetch_array($faz_procura);
	echo"<tr>";
	
	echo'<td align="left">'.$registos['id_publicar'].'</td>';
	echo'<td align="left">'.$registos['Nome'].'</td>';
	echo'<td align="left">'.$registos['areaprojeto'].'</td>';
	echo'<td align="left">'.$registos['objetivo'].'</td>';
	echo'<td align="left">'.$registos['publico'].'</td>';
	
	
	echo"</tr>";
}
?>
</table>
</div></div></div></div></div>
<!-- Contact -->
									<section>
                                    <div style="background-color:#333">
									<h2><font color="white">InformaÇÕes</font></h2>
										<div>
											<div class="row">
												<div class="col-6 col-12-small">
													<dl class="contact">
														<dt><font color="white">Twitter</font></dt>
														<dd><a href="#">@untitled-corp</a></dd>
														<dt><font color="white">Facebook</font></dt>
														<dd><a href="#">facebook.com/tomasruivo</a></dd>
														<dt><font color="white">WWW</font></dt>
														<dd><a href="#">untitled.tld</a></dd>
														<dt><font color="white">Email</font></dt>
														<dd><a href="#">tomasruivo01@gmail.com</a></dd>
													</dl>
												</div>
												<div class="col-6 col-12-small">
													<dl class="contact">
														<dt><font color="white">Address</font></dt>
														<dd>
															1234 Fictional Rd<br />
															Nashville, TN 00000-0000<br />
															USA
														</dd>
														<dt><font color="white">Phone</font></dt>
														<dd>915003317</dd>
													</dl>
												</div>
                                                </div>
											</div>
										</div>
									</section>

							</div>
							<div class="col-12">
								<div id="copyright">
									<ul class="menu">
										<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

</head>

</html>
