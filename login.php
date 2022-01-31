<title>DIPE- projetoPAP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	<head>
		<title>Login</title>
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
<?php
// Inicialize a sessão
session_start();
 
// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Incluir arquivo de configuração
require_once "config.php";
 
// Defina variáveis e inicialize com valores vazios
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Verifique se o nome de usuário está vazio
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, insira o nome de usuário.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Verifique se a senha está vazia
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar credenciais
    if(empty($username_err) && empty($password_err)){
        // Prepare uma declaração selecionada
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = trim($_POST["username"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                // Verifique se o nome de usuário existe, se sim, verifique a senha
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // A senha está correta, então inicie uma nova sessão
                            session_start();
                            
                            // Armazene dados em variáveis de sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirecionar o usuário para a página de boas-vindas
                            header("location: DIBI-ProjetoPAP.html");
                        } else{
                            // A senha não é válida, exibe uma mensagem de erro genérica
                            $login_err = "Nome de usuário ou senha inválidos.";
                        }
                    }
                } else{
                    // O nome de usuário não existe, exibe uma mensagem de erro genérica
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Fechar conexão
    unset($pdo);
	
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{  font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
		
    </style>
</head>

<body>
	<div align="center">  
    <div align="center" class="wrapper">
        <h2>Login</h2>
        <p> Por favor, preencha os campos para fazer o login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div align="center" class="form-group">
                <label>Nome do usuário</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div align="center" class="form-group">
                <label> Senha</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div align="center" class="form-group">
                <input type="submit" class="btn btn-primary" value="Entrar">
            </div>
            <p>Não tem uma conta? <a href="register.php">Inscreva-se agora</a>.</p>
        </form>
    </div>
	</div>
    <!-- Contact -->
									<section>
                                    
									<h2><font color="white">InformaÇÕes</font></h2>
										<div style="background:#333">
                                        
                                        
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
														<dd style="color:#FFF">
															1234 Fictional Rd<br />
															Nashville, TN 00000-0000<br />
															USA
														</dd>
														<dt><font color="white">Phone</font></dt>
														<dd style="color:#FFF">915003317</dd> 
													</dl>
                                                    
												
											</div>
										
									
											
                  
							<div class="col-12" style="background:#333">
								<div id="copyright">
									<ul class="menu">
										<li style="color:#FFF">&copy; Untitled. All rights reserved</li><li style="color:#FFF">Design: <a href="http://html5up.net">HTML5 UP</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>
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
</body>
</html>