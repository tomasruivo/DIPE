<title>DIPE- projetoPAP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="right-sidebar is-preload">
		<div id="page-wrapper" >

			<!-- Header Wrapper -->
				<div id="header-wrapper">
					<div class="container">

						<!-- Header -->
							<header id="header">
								<div class="inner">

									<!-- Logo -->
										<h1><a href="DIBI-ProjetoPAP.html" id="logo">DIBI</a></h1>

									<!-- Nav -->
										<nav id="nav">
											<ul>
												<li><a href="entrar2ing.html">Publicação de ideia</a></li>
												<li>
													<a href="pesquisar2ing.php">procura de ideias</a>
													<ul>
														<li><a href="#">Lorem ipsum dolor</a></li>
														<li><a href="#">Magna phasellus</a></li>
														<li>
															<a href="#">Phasellus consequat</a>
															<ul>
																<li><a href="#">Lorem ipsum dolor</a></li>
																<li><a href="#">Phasellus consequat</a></li>
																<li><a href="#">Magna phasellus</a></li>
																<li><a href="#">Etiam dolore nisl</a></li>
															</ul>
														</li>
														<li><a href="#">Veroeros feugiat</a></li>
													</ul>
												</li>
												<li><a href="sobrenoss2ing.html">Sobre nós</a></li>
												<li class="current_page_item"><a href="#">Idioma</a>
                                                <ul>
														<li><a href="DIBI-ProjetoPAP.html">Portuguese</a></li>
														<li><a href="DIBI-ProjetoPAP2ing.html">English</a></li>
													</ul>
                                                </li>
												<li><a href="login.html">Conta</a></li>
											</ul>
										</nav>

								</div>
							</header>

					</div>
				</div>
<?php
// Incluir arquivo de configuração
require_once "config.php";
 
// Defina variáveis e inicialize com valores vazios
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar nome de usuário
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor coloque um nome de usuário.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
    } else{
        // Prepare uma declaração selecionada
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = trim($_POST["username"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Este nome de usuário já está em uso.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Validar senha
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor insira uma senha.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar e confirmar a senha
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não confere.";
        }
    }
    
    // Verifique os erros de entrada antes de inserir no banco de dados
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare uma declaração de inserção
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                // Redirecionar para a página de login
                header("location: login.php");
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
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
	<div align="center"> 
    <div class="wrapper" align="center">
        <h2>Register</h2>
        <p>Please complete this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         
            <div class="form-group" align="center">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group" align="center">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group" align="center">
                <label>Confirm the Password</label>
                  <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group" align="center">
                <input type="submit" class="btn btn-primary" value="
Create an account">
                <input type="reset" class="btn btn-secondary ml-2" value="Erase data">
            </div>
            <p align="center">Already have an account? <a href="login2ING.php">Between here</a>.</p>
        </form>
    </div> 
    <!-- Contact -->
									<section>
                                    
									<h2><font color="white">Information</font></h2>
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