/*
 A funcao LISTAGG() concatena os valores de uma coluna em uma �nica string.
 */
SELECT
    LISTAGG(FK_RESPONSAVEL, ',') WITHIN GROUP (ORDER BY FK_RESPONSAVEL) AS RESPONSAVEIS
FROM
    PAC_RESPONSAVEIS