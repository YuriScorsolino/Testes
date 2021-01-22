<!DOCTYPE html>
<html>

 <lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="estilizar.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="contato.js"></script>
    <title>Contato</title>  
 
</head>
<body>


<nav>

<ul id="ul-1">

	<li class="li-p">
		<a href="index.html">Home </a>

	 </li>

	<li class="li-p">
		<a href="javascript://" class="bt1">Albuns
			<img src="novo/seta.png" width="20"> </a> 
		<ul class="ul-albuns">

			<li><a href="medieval.html">Medieval </a></li> 
			<li><a href="aniversario.html">Aniversario </a></li> 
			<li><a href="verao.html">Verão </a></li>  

		</ul>
	
	</li>

	<li class="li-p">
		<a href="novo.php">Contatos </a> 
	
	</li>

	<li class="li-p">
		<a href="downloads.html">Downloads </a>
	 </li>

	<li class="li-p">
		<a href="sobre.html">Sobre </a>

	 </li>



</ul>

</nav>

	<?php 
		include 'header.php';
		$aula_atual = 'valida-formularios';
    ?>
    
    <?php 
		function clean_input($data){
			$cleandata = trim($data);
			$cleandata = stripslashes($cleandata);
			$cleandata = htmlspecialchars($cleandata);

			return $cleandata;

        }
        

    ?>
    <h2>Entre em contato conosco</h2>

		<h3>Preencha os campos a baixo</h3>
		
        <?php
        
        if ($_SERVER['REQUEST_METHOD']=='POST'){
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$whats = $_POST['whats'];
			$cidade = $_POST['cidade'];
			$assunto = $_POST['assunto'];

			if ($nome == "") {
				$erro_nome = '*  nome é obrigatório';

			}elseif ($email == "") {
				$erro_email = '*  email é obrigatório';
			}elseif (filter_var($email)== false) {
				$erro_email ='*  O email é inválido!';
			}else  {
				$nome = clean_input ($nome);
				$email = clean_input ($email);

				$server = 'localhost';
				$user = 'root';
			    $password ='root';
			    $dbname = 'fotografia';
			    $port = '8889';

			    $db_connect = new mysqli($server , $user , $password , $dbname , $port);

			    if ($db_connect ->connect_error == true ) {
			    	echo 'falha na conexao :' . $db_connect ->connect_error;}
			    	else{
			    		echo 'cadastrado com sucesso.'. '<br>';


			    		$sql = "INSERT INTO fotos (nome,email,whats,cidade,assunto)VALUES('$nome','$email','$whats','$cidade','$assunto')";
			    		$db_connect->query($sql);
			    	}

			}
		}

		?>

            <form action="novo.php" method="post">
			<div id="denun">
			Nome: *
			<br>
			<input type="text" name="nome" class="field">
			<br>
			<div class = "erro-form"><?php echo $erro_nome; ?></div>
			<br>
			
			E-mail: *
			<br>
			<input type="text" name="email" class="field">
			<br>
			<div class = "erro-form"><?php echo $erro_email; ?></div>
			<br>

			Local da denuncia: *
			<br>
			<input type="text" name="whats" class="field">
			<br><br>
			

			Cidade: *
			<br>
			<input type="text" name="cidade" class="field">
			<br><br>
			

			Denúncia: *
			<br>
			<input type="text" name="assunto" class="field" >
			<br><br>
			
				<div id="bot">
			<input type="submit" value="Enviar" class="submit"><br>
			<div class = "sucesso-form"></div>
				</div>
			</div>

		</form>
</body>
</html>