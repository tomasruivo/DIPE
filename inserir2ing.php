<!DOCTYPE HTML>
<!--
	ZeroFour by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>InserirING</title>
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
										<h1><a href="DIBI-ProjetoPAP2ing.html" id="logo">DIPI</a></h1>

									<!-- Nav -->
										<nav id="nav">
											<ul>
												<li><a href="entrar2ing.html">Publicação de ideias</a></li>	<li>
													<a href="pesquisar2ing.php">procura de ideias</a>
													<ul>
														<li><a href="#">Informatica</a></li>
														<li><a href="#">animais</a></li>
														<li>
															<a href="pesquisar2ing.php">outros</a>
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
												<li><a href="sobrenoss2ing.html">Sobre nós</a></li>
												<li class="current_page_item"><a href="DIBI-ProjetoPAP.html">Idioma</a>
                                                <ul>
														<li><a href="DIBI-ProjetoPAP.html">Portuguese</a></li>
														<li><a href="DIBI-ProjetoPAP2ing.html">English</a></li>
													</ul>
                                                </li>
												<li><a href="login.php">Conta</a></li>
											</ul>
										</nav>

								</div>
							</header>

					</div>
				</div>

<div style="color:#FFF">
<head> <title> Inserir </title> </head>
<meta charset="utf-8">
<body> <h2 style="color:#FFF" align="center"> Insert Records </h2>


<?php
$id_publicar = $_POST['id_publicar'];
$Nome = $_POST['Nome'];
$areaprojeto = $_POST['areaprojeto'];
$objetivo = $_POST['objetivo'];
$publico = $_POST['publico'];

if (!$id_publicar || !$Nome || !$areaprojeto || !$objetivo || !$publico) {
 echo 'Campos em falta.
 Volte atrás e tente de novo.'; exit;}
 echo 'Dados recebidos: <br />'; 


$ligax = mysqli_connect('localhost', 'root','','dibi');
if (!$ligax)
 {echo '<p> Erro: Falha na ligação.'; exit;}
mysqli_select_db($ligax, 'dibi');
$insere = "insert into publicacao values
 ('".$id_publicar."','".$Nome."', '".$areaprojeto."', '".$objetivo."', '".$publico."')";
$result = mysqli_query($ligax, $insere);
if ($result==1) echo "<p>Dados inseridos<br>";
else "<p>Dados não inseridos<br>";
?>
</div>
<p> <a href="entrar.html">back to entry</a>

<!-- Contact -->
									<section>
									<h2><font color="white">Information</font></h2>
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