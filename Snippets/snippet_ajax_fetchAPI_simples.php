<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX com fetch simples</title>
    <script>
        const URL = 'https://dog.ceo/api/breeds/list/all'
        fetch(`${URL}`)
            .then((body) => body.json()) //'body' � o retorno da requisi��o; converte esse retorno para um objeto
            .then((data) => console.log(data)) //o retorno da fun��o .json() tamb�m � uma Promise; imprime esse objeto depois que terminar o parsing
            .catch((error) => console.error('Erro:', error.message || error)) //o operador || retorna o pr�prio error (o objeto completo), o que pode ser �til caso o erro n�o tenha uma mensagem espec�fica.
    </script>
</head>

<body>
    Observe o console
</body>

</html>