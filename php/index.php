<!DOCTYPE html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style1.css" />
	<title>Agenda de Contatos</title>
</head>

<body>
	<nav class="navbar">
		<div class="logo">Agenda de Contatos</div>

		<ul class="nav-links">
			<div class="menu">

				<li><a href="index.php">Início</a></li>
				<li><a href="?page=novo">Cadastrar contato</a></li>
				<li><a href="?page=listar">Listar contatos</a></li>
				<li><a href="?page=buscar">Buscar contato</a></li>
			</div>
		</ul>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col mt-5">
				<?php
					include("config.php");
					switch (@$_REQUEST["page"]) {
						case "novo":
							include("novo-contato.php");
							break;
						case "listar":
							include("listar-contatos.php");
							break;
						case "buscar":
							include("buscar-contato.php");
							break;
						case "utils":
							include("utils-contatos.php");
							break;
						case "editar":
							include("editar-contato.php");
							break;
						default:
							echo "<h1>Bem-vindo(a) à agenda de contatos!</h1>";
							echo "<br><h4>Navegue através da barra superior</h4>";
					}
				?>
			</div>
		</div>
	</div>

</body>

</html>
