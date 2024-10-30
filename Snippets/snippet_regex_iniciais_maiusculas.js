let elemento = document.querySelector('#id_sc_field_nome_funcionario_7');
elemento.textContent.toLocaleLowerCase().replaceAll(/(:?^|\s)([a-z])(?=[a-z]{2,})/g, (firstLetter) => firstLetter.toLocaleUpperCase());

/*

Analisando o trecho de c�digo:
Objetivo: formatar iniciais dos nome das pessoas para letras mai�sculas

1- Seleciona um elemento HTML usando querySelector com o ID #id_sc_field_nome_funcionario_7.
2- Converte o conte�do do texto (textContent) desse elemento para letras min�sculas com .toLocaleLowerCase().
3- Aplica a transforma��o com replaceAll() usando a express�o regular /(:?^|\s)([a-z])(?=[a-z]{2,})/g para encontrar certas letras e capitaliz�-las.

Analisando a Express�o Regular /(:?^|\s)([a-z])(?=[a-z]{2,})/g. Essencialmente, essa regex identifica a primeira letra min�scula de palavras com tr�s ou mais letras, desde que a letra esteja no in�cio da palavra.

Explicando cada trecho da regex:
1. (:?^|\s) => identifica onde a palavra come�a, seja no in�cio da string ou logo ap�s um espa�o.
    : indica um grupo de agrupamento n�o capturante. Isso significa que a parte (^|\s) ser� verificada, mas n�o armazenada como uma captura separada.
    (^|\s) combina o in�cio da string ou qualquer espa�o em branco.
2. ([a-z]) => Este grupo capturante identifica uma �nica letra min�scula ([a-z]).
3. (?=[a-z]{2,}) => Esta � uma "assertiva de lookahead positiva" que verifica se h� pelo menos duas letras min�sculas logo ap�s o caractere capturado. Isso garante que a letra encontrada (no segundo grupo ([a-z])) esteja no in�cio de uma palavra com tr�s ou mais letras.
4. /g nesse modificador indica o modo global, ou seja, instrui o mecanismo de regex a continuar buscando por todas as correspond�ncias na string em vez de parar na primeira ocorr�ncia.

*/