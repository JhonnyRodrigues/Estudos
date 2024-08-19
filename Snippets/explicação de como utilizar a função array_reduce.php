<?php

$textao = '13/08/13 09h42min - Victor Silva - PIRACICABA.solida:
<ul><li><strong>Arquivo</strong> <a href="/redmine/attachments/download/20302/2CadastroCliente.png">2CadastroCliente.png</a> adicionado</li><li><strong>Arquivo</strong> <a href="/redmine/attachments/download/20306/CadastroAS2024112541.png">CadastroAS2024112541.png</a> adicionado</li></ul><p>Teste realizado ontem pelo solicitante:
Exemplos de altera��es cadastrais e testes NO VALIDA:</ p> <p>? MATR�CULA 198291</ p> <p>NO dia 21 / 06 / 2024 foi aberta a AS2024110187 ? ? 4552 ? Servi�o Comercial ?,
que ficou pendente at� o dia 12 / 08 / 2024,
DATA de sua conclus�o. NO dia 15 / 07 / 2024,
acerca da AS mencionada,
o Setor de Cadastramento e Registro alterou a titularidade,
a categoria ? de Residencial para P�blico-Municipal ? inseriu complemento: ? Campo de Futebol ?,
e ainda inseriu endere�o alternativo: ? Rua Ant�nio Corr�a Barbosa,
2233 ?. Verifica-se que ap�s o encerramento da referida AS,
realizado pela Divis�o de Relacionamento Comercial NO dia 12 / 08 / 2024,
parte das altera��es realizadas NO dia 15 / 07 / 2024 pelo Setor de Cadastramento e Registro se perderam,
voltando para o estado anterior,
conforme podemos verificar NO hist�rico: categoria retornou para residencial,
o endere�o alternativo e o complemento foram removidos.</ p> <p>? MATR�CULA 34353</ p> <p>Para testes,
realizamos altera��es cadastrais NO VALIDA,
e NO dia 09 / 08 / 2024 �s 08:29 h foi aberta a AS2024112536 "3362 - Servi�os Diversos Fiscaliza��o". NO mesmo dia �s 08:30 h,
o Setor de Cadastramento e Registro alterou a categoria de comercial para residencial e a numera��o da casa de ? 53 ? para ? 100 ?. Observa-se que �s 08:34 h,
o escritur�rio Rafael Romani do polo Piracicamirim,
� pedido,
concluiu a AS2024112536,
e,
consequentemente,
como podemos verificar NO hist�rico a categoria e a numera��o voltaram respectivamente para comercial e ? 53 ? NO mesmo hor�rio da conclus�o da AS2024112536.</ p> <p>Em continuidade ao teste,
NO dia 10 / 08 / 2024 �s 09:19 h foi aberta a AS2024112541 ? 4552-Servi�o Comercial ?. Na sequ�ncia,
�s 09:37 h,
realizei v�rias altera��es cadastrais (
	troca de titularidade,
	inser��o de complemento de endere�o e endere�o alternativo,
	altera��o do n�mero do im�vel de ? 53 ? para ? 200 ?,
	da categoria de comercial para residencial e da economia de 2 para 1
). Observa-se que NO dia 12 / 08 / 2024,
foi conclu�da a AS 202411254,
e o resultado foi o retorno da categoria de residencial para comercial e a economia de 1 para 2,
permanecendo somente AS demais altera��es realizadas para teste.</ p> <p>Ap�s os testes,
verificamos que AS situa��es acima relatadas ocorrem em autoriza��es de servi�os que possuem dentro de sua conclus�o ou encerramento,
a possibilidade de altera��es cadastrais na aba ? 2 Cadastro de Cliente ?,
anexo 2 CadastroCliente.</ p> <p>Sendo assim,
podemos concluir que essas autoriza��es de servi�os que possibilitam acertos cadastrais em sua conclus�o,
n�o carregam AS informa��es atualizadas NO momento de seu encerramento,
mas sim informa��es cadastrais da DATA de sua abertura,
de modo que,
se ocorrerem altera��es do n�mero do im�vel ou da categoria entre o per�odo de sua abertura e encerramento,
esses dados cadastrais alterados,
n�o estar�o atualizados NO momento se der o encerramento dessas AS ? s. Ademais,
saliento que nem sempre essas autoriza��es de servi�os t�m como finalidade altera��es cadastrais,
de maneira que,
NO momento de seu encerramento,
comumente inserem o parecer na aba ? 1 Dados da Execu��o ?,
sem verificar os dados cadastrais na aba ? 2 Cadastro de Cliente ?,
salvando diretamente,
executando a ordem de servi�o,
resultando NO problema que aqui temos por objeto.</ p> <p>Para complementar,
salientamos que essas autoriza��es de servi�os s�o abertas por diversos motivos,
e n�o necessariamente para realiza��o de altera��es cadastrais,
de forma que n�o � incumb�ncia do usu�rio que vai encerrar a autoriza��o de servi�o,
verificar se os dados cadastrais na aba ? 2 Cadastro de Cliente ?,
est�o iguais ao da matr�cula,
isto �,
atualizados.</ p> <p>Como exemplo,
segue o print da aba ? 2 Cadastro de Cliente ? da AS2024112541 da matr�cula 34353,
antes de seu encerramento.</ p> <p>Conforme observamos na imagem,
a categoria do im�vel j� estava atualizada para RESIDENCIAL e economia 1,
por�m,
dentro da AS2024112541,
ainda constava como COMERCIAL e economia 2. Ao encerrar essa autoriza��o de servi�o,
sua categoria � alterada indevidamente para COMERCIAL,
economia 2. Salientamos que acertos cadastrais s�o realizados por diversos setores dentro do SEMAE (
	Cadastro ? Atendimento ? Fiscaliza��o ? Relacionamento Comercial
).</ p> <p>Para solu��o do problema,
entendemos que AS autoriza��es de servi�os que possibilitem altera��es cadastrais,
NO ato de seu encerramento,
precisam estar com todas AS informa��es cadastrais atualizadas na aba ? 2 Cadastro de Cliente ?,
e n�o somente algumas,
como a titularidade da liga��o,
mas tamb�m a categoria,
numera��o do im�vel etc.</ p>';

$array = str_split($textao, 4000); //quebra o texto em peda�os de 4 mil caracteres para cada chave de um array
var_dump($array);

$result = array_reduce($array,
	function ($acumulador, $chunk) {
		$acumulador .= "|| TO_CLOB('{$chunk}')"; //concatena a fun��o CLOB para cada peda�o do $textao
		return $acumulador;
	},
	'' //acumulador � iniciado como uma string vazia
);

var_dump($result);


a sa�da imprimir�: string(5249) "|| TO_CLOB('13/08/13 09h42min - V ... blahblahblah ... al')|| TO_CLOB('tera��es ...blahblahblah ... numera��o do im�vel etc.</ p>')"

//Nota: posteriormente, foi implementada condicional tern�ria no $acumulador para que a string n�o inicie com o operador de concatena��o (||) do SGBD Oracle