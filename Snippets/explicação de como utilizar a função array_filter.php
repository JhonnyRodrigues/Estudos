a sa�da com var_dump() imprimia: array(2) { [0]=> bool(false) [1]=> bool(false) }
Inten��o: eliminar valores falsos de dentro do array
<?php

# CHAMA FUN��ES DE NOTIFICA��O EM MODAL
if ([usr_login]) {
	$notificacoes = array(
		controlLastViewed(1, 'getSqlAssinaturasPendentes'),
		controlLastViewed(2, 'getSqlAguardandoResposta'),
	);
	
	$notificacoes = array_filter(
		$notificacoes,
		function($value) {
			return $value !== false;
		}
	);
	
	echo 'onExecute<hr>';
	var_dump($notificacoes);exit;
}

Ap�s array_filter() a sa�da ficou: array(0) { }