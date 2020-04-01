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
	require_once "conexao/conexao.php";
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
						<th>Nome</th>
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
							while ($registro = $busca->fetch_object()) {
								
                                echo "
                                <tr id=\"paciente-$registro->id_paciente\">
                                    <td class='info-nome'>$registro->nome</td>
                                    <td class='info-peso'>$registro->peso</td>
                                    <td class='info-altura'>$registro->altura</td>
									<td class='info-gordura'>$registro->gordura_corporal</td>
                                    <td class='info-imc'> </td>
                                </tr>"; 
                            }
                            echo "<input id='info-total' hidden value='$total'>";
                        }
                    }
					?>
				</tbody>

			</table>

		</section>
	</main>

	<section class="container">
    <h2 id="titulo-form">Adicionar novo paciente</h2>
		<form id="form-adiciona">
			<div class="grupo">
				<label for="nome">Nome:</label>
				<input id="nome" name="nome" type="text" placeholder="digite o nome do seu paciente" class="campo">
			</div>
			<div class="grupo">
				<label for="peso">Peso:</label>
				<input id="peso" name="peso" type="text" placeholder="digite o peso do seu paciente" class="campo campo-medio">
			</div>
			<div class="grupo">
				<label for="altura">Altura:</label>
				<input id="altura" name="altura" type="text" placeholder="digite a altura do seu paciente" class="campo campo-medio">
			</div>
			<div class="grupo">
				<label for="gordura">% de Gordura:</label>
				<input id="gordura" type="text" placeholder="digite a porcentagem de gordura do seu paciente" class="campo campo-medio">
			</div>

			<button id="adicionar-paciente" class="botao bto-principal">Adicionar</button>
		</form>
	</section>

	<script src="js/principal.js"></script>
	<!--importação do JS-->

</body>


</html>