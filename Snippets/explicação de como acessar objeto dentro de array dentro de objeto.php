<?php
//traduzindo isso:      {"riscos":[ { 'id_rico':'27','chave':'valor'} , {'chave':'valor','chave':'valor' } ] }

    class stdClassP //um objeto nada mais � do que uma inst�ncia de uma classe
    {
        public $riscos = array( //1 array est� dentro do objeto
            new stdClassRisco(), //v�rios objetos est�o dentro desse array
            new stdClassRisco(),
            new stdClassRisco()
        );
    }
    
    //atribuindo o valor '27' para a propriedade(vari�vel) '$id_risco'
    class stdClassRisco
    {
        public $id_risco = '27';
    }
    
    $std = new stdClassP(); //'$std' � uma nova inst�ncia da classe 'stdClassP'

    $std->riscos[0]->id_risco // objeto->array[posi��o]->chave

    foreach ($std->riscos as $berimbau) { //para cada elemento (nomeado como 'berimbau'), do array 'riscos', fa�a...
        $berimbau->id_risco
    }