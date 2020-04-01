<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Aparecida Nutrição</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>

	<?php
	// require_once "conexao/conexao.php";
	?>

	<header>
		<div class="container">
			<h1 class="titulo">Aparecida Nutrição</h1>
		</div>
	</header>
	<main>
		<section class="container">
			<h2>Meus pacientes</h2>
			<table class="table">

				<thead>
					<tr>
						<th cla>Nome</th>
						<th>Peso(kg)</th>
						<th>Altura(m)</th>
						<th>Gordura Corporal(%)</th>
						<th>IMC</th>
					</tr>
				</thead>
				<tbody id="tabela-pacientes">
					
					<?php
					$busca = $conexao->query("select * from paciente");
					$total = $busca->num_rows;
					if (!$busca) {
						echo "erro";
					} else {
						if ($busca->num_rows == 0) {
							echo "Erro";
						} else {
							while ($registro = $busca->fetch_array(MYSQLI_NUM)) {
								echo "<tr class='paciente' id='paciente-".$registro[0]."'>";
								for ($i = 1; $i < count($registro); $i++) {
									switch($i){
										case 1: 
											$info = "info-nome";
										break;
										case 2:
											$info = "info-peso";
										break;
										case 3:
											$info = "info-altura";
										break;
										case 4: 
											$info = "info-gordura";
										break;
										default:
      										$info = "info-";
										
									}
									echo "<td class='$info'>" . $registro[$i] . "</td>";
								}
								echo "<td class='info-imc'>0</td>";
								echo "</tr>";
							}
							echo "<input id='info-total' hidden value='$total'>";
						}
					}
					?>
				</tbody>

			</table>

		</section>
	</main>

	<!-- <script src="js/principal.js"></script> -->
	<!--importação do JS-->

</body>


</html>