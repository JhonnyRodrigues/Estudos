<?php

$variavel = array(
	'teste' => array (
		'data' => '2022-11-09',
		'ph' => array (
			'10',
			'20'
		)
	)
);
// uma vari�vel, que cont�m um array, que cont�m em sua 1� propriedade 'teste' outro array , de 2 posi��es('data' e 'ph'); sendo que a 1� posi��o cont�m uma data, e a 2� posi��o cont�m outro array; este �ltimo array tamb�m com 2 posi��es n�o-nomeadas (portanto, [0] e [1]) e respectivamente com valores '10' e '20'

foreach ($variavel['teste']['ph'] as $value) {...} //para cada valor-de-chave do array 'ph', fa�a...

/*
o operador -> � usado para acessar m�todos e propriedades de um OBJETO
o operador => � usado para associar valores a chaves de um ARRAY
*/

?>