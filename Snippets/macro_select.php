<?php

{} = (empty()) ? 'NULL' : {};
$query = "

";
sc_select(dataset, $query);
if ( {dataset} === false ) {
	exit("N�o foi poss�vel consultar .");
	echo "Erro de conex�o com o Banco de Dados. Consulta de ??????????? n�o realizada. Mensagem = " . {datasetExames_erro};
} else {
	while ( !{dataset}->EOF ) {
		$var = {dataset}->fields[''];
		{dataset}->MoveNext();
	}
	{dataset}->Close();
}