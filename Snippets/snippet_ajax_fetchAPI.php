<script>
var email = window.prompt("Insira o endere�o de e-mail para ser enviado o teste");
if (email == '') {
	window.alert("Insira um e-mail v�lido!");
} else {
	// Configura��es da request
	var requestOptions = {
		method: 'POST', //verbo HTTP
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded' // Tipo de conte�do da request
		},
		body: 'email=' + encodeURIComponent(email) // Dados a serem enviados para o PHP (no formato de par�metros de consulta)
	};

	// Enviar a solicita��o usando Fetch API
	fetch('../TESTAR_ENVIO_EMAILS_B/index.php', requestOptions)
		.then(response => {
			if (!response.ok) {
				throw new Error('Ocorreu um erro na solicita��o AJAX');
			}
			return response.text(); // Tipo de conte�do da response
		})
		.then(data => {
			// Se a solicita��o for bem-sucedida, fa�a algo com a resposta do PHP			
			document.querySelector('#sc_grid_head .scGridHeaderFont:first-child').innerHTML = data;
			console.log("Resposta do PHP:", data);
			Swal.fire({
				type: 'success',
				title: 'Sucesso!',
				text: data
			});
		})
		.catch(error => {
			// Se ocorrer um erro na solicita��o AJAX, trate-o aqui
			console.error("N�o foi poss�vel processar a solicita��o AJAX:", error);
			Swal.fire({
				type: 'error',
				title: 'N�o enviado!',
				text: error
			});
		});	
}
</script>

<?php
header('Content-Type: text/html; charset=utf-8'); // Configurar o arquivo para o charset padrao da web

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $mensagem = mb_convert_encoding("Um e-mail foi enviado para o endere�o: $email.", 'UTF-8', 'ISO-8859-1');

    echo $mensagem; // Retorna uma string de volta ao JavaScript
} else {
    echo mb_convert_encoding("Erro: Par�metro n�o recebido.", 'UTF-8', 'ISO-8859-1');
}
?>