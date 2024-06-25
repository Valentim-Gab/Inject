<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<title>Usuário - Injection</title>
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script defer src="https://code.jquery.com/jquery-3.6.0.min.js"
	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script defer src="../JS/javascriptPesquisar.js" type="text/javascript"></script>
</head>
<body style="background-color: #d6d7d9; font-family: Poppins;">
	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="../index.php">
				<img src="../public/assets/images/logos/logo.png" alt="logo" style="width: 200px;" />
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="../index.php">Início</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="usuarios.php">Usuários</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
				</ul>		      	
			</div>
		</div>
	</nav>

	<main class="container py-5">
		<?php
			include '../../model/userModel.php';

			$id = $_GET["id"];
			$resultado = get($id);
			$resultadoSeparado = mysqli_fetch_assoc($resultado);
		?>

		<h1><?php echo $resultadoSeparado['NAME']; ?></h1>
		<h3><?php echo $resultadoSeparado['DESCRIPTION']; ?></h3>

		<section style="margin-top: 4rem;">
			<div class="row h-100 justify-content-center align-items-center">
				<h3>Fotos do usuário</h3>
			</div>
			<div class="mb-3">
				<label for="searchImage" class="form-label">Pesquisar:</label>
				<input type="text" class="form-control" id="searchImage" name="searchImage" placeholder="Título da imagem">
			</div>
		</section>

		<section class="imagesSearch" style="display: flex; flex-wrap: wrap; gap: 2rem; margin-top: 2rem;">
			<?php
				include '../../model/imageModel.php';
				
				$images = getAllByUser($id);

				if ($images) {
					while($image = mysqli_fetch_assoc($images)){
						echo "
							<div>
								<p>$image[TITLE]</p>
								<img src='$image[URL_IMAGE]' alt='' style='width: 200px; border-radius: 0.25rem;' />
							</div>
						";
					}
				}
			?>
		</section>
	</main>
</body>
</html>