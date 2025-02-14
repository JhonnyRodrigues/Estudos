-- Nesse exemplo, a cl�usula WITH (uma esp�cie de view inline) pemite ordenar os campos de forma espec�fica: colocando as solicita��es abertas no topo, seguidas das demais (como 'encaminhadas', 'analisando', ect)

WITH subquery AS (
    SELECT
        S.ID_SOLICITACAO AS ID_SOLICITACAO,
        S.COD_CHAMADO AS COD_CHAMADO,
        S.FK_SOLICITANTE AS FK_SOLICITANTE,
        S.FK_REPARTICAO AS FK_REPARTICAO,
        S.FK_RAMAL AS FK_RAMAL,
        S.EMAIL AS EMAIL,
        S.FK_CATEGORIA_SERVICO AS FK_CATEGORIA_SERVICO,
        C.ID_CATEGORIA AS ID_CATEGORIA,
        SV.ID_SERVICO AS ID_SERVICO,
        SIS.ID_SISTEMA AS ID_SISTEMA,
        E.ID_EQUIPAMENTO AS ID_EQUIPAMENTO,
        S.FK_PRIORIDADE AS FK_PRIORIDADE,
        S.DATA_ABERTURA AS DATA_ABERTURA,
        S.DATA_ENCERRAMENTO AS DATA_ENCERRAMENTO,
        S.ENDERECO_IP AS IP,
        S.PATRIMONIO AS PATRIMONIO,
        S.ASSUNTO AS ASSUNTO,
        H.ID_HISTORICO AS ID_HISTORICO,
        H.DATA_INSERCAO AS DATA_HISTORICO,
        H.FK_ENCAMINHADA_POR AS FK_ENCAMINHADA_POR,
        H.FK_RESPONSAVEL AS FK_RESPONSAVEL,
        H.FK_STATUS AS FK_STATUS,
        H.MENSAGEM AS MENSAGEM,
        H.FK_PARCEIRO AS PARCEIRO,
        H.OS_PARCEIRO AS OS_PARCEIRO
    FROM
        HELP_SOLICITACOES S
    JOIN
        HELP_HISTORICOS H ON H.FK_SOLICITACAO = S.ID_SOLICITACAO
    JOIN
        HELP_CATEGORIAS_SERVICOS CS ON	CS.ID_CATEGORIA_SERVICO = S.FK_CATEGORIA_SERVICO
    JOIN
        HELP_CATEGORIAS C ON C.ID_CATEGORIA = CS.FK_CATEGORIA
    JOIN
        HELP_SERVICOS SV ON SV.ID_SERVICO = CS.FK_SERVICO
    LEFT JOIN
        HELP_SISTEMAS SIS ON SIS.ID_SISTEMA = CS.FK_SISTEMA
    LEFT JOIN
        HELP_EQUIPAMENTOS E ON E.ID_EQUIPAMENTO = CS.FK_EQUIPAMENTO
    WHERE
        H.ID_HISTORICO = (
            SELECT
                ID_HISTORICO
            FROM
                ( SELECT
                    H2.ID_HISTORICO,
                    H2.FK_SOLICITACAO
                FROM
                    HELP_HISTORICOS H2
                ORDER BY
                    H2.DATA_INSERCAO DESC
                ) TAB
            WHERE
                TAB.FK_SOLICITACAO = H.FK_SOLICITACAO
            AND
                ROWNUM = 1
        )
    AND 
        FK_STATUS NOT IN ( 4, 9, 10 )
    -- ORDER BY
    --     ( CASE FK_STATUS WHEN 1 THEN 1 ELSE 2 END ),
    --     DATA_HISTORICO DESC,
    --     FK_STATUS
)
SELECT
    CASE subquery.FK_STATUS WHEN 1 THEN 1 ELSE 2 END AS ordenacao_subquery,
    subquery.*
FROM
    subquery
ORDER BY
    ordenacao_subquery,
    DATA_HISTORICO DESC,
    FK_STATUS

--########################## Nesse exemplo espec�fico, o c�digo acima pode ser substitu�do, sem nenhum preju�zo, pelo c�digo a seguir:

SELECT
	S.ID_SOLICITACAO AS ID_SOLICITACAO,
	S.COD_CHAMADO AS COD_CHAMADO,
	S.FK_SOLICITANTE AS FK_SOLICITANTE,
	S.FK_REPARTICAO AS FK_REPARTICAO,
	S.FK_RAMAL AS FK_RAMAL,
	S.EMAIL AS EMAIL,
	S.FK_CATEGORIA_SERVICO AS FK_CATEGORIA_SERVICO,
	C.ID_CATEGORIA AS ID_CATEGORIA,
	SV.ID_SERVICO AS ID_SERVICO,
	SIS.ID_SISTEMA AS ID_SISTEMA,
	E.ID_EQUIPAMENTO AS ID_EQUIPAMENTO,
	S.FK_PRIORIDADE AS FK_PRIORIDADE,
	S.DATA_ABERTURA AS DATA_ABERTURA,
	S.DATA_ENCERRAMENTO AS DATA_ENCERRAMENTO,
	S.ENDERECO_IP AS IP,
	S.PATRIMONIO AS PATRIMONIO,
	S.ASSUNTO AS ASSUNTO,
	H.ID_HISTORICO AS ID_HISTORICO,
	H.DATA_INSERCAO AS DATA_HISTORICO,
	H.FK_ENCAMINHADA_POR AS FK_ENCAMINHADA_POR,
	H.FK_RESPONSAVEL AS FK_RESPONSAVEL,
	H.FK_STATUS AS FK_STATUS,
	H.MENSAGEM AS MENSAGEM,
	H.FK_PARCEIRO AS PARCEIRO,
	H.OS_PARCEIRO AS OS_PARCEIRO
FROM
	HELP_SOLICITACOES S
JOIN
	HELP_HISTORICOS H ON H.FK_SOLICITACAO = S.ID_SOLICITACAO
JOIN
	HELP_CATEGORIAS_SERVICOS CS ON	CS.ID_CATEGORIA_SERVICO = S.FK_CATEGORIA_SERVICO
JOIN
	HELP_CATEGORIAS C ON C.ID_CATEGORIA = CS.FK_CATEGORIA
JOIN
	HELP_SERVICOS SV ON SV.ID_SERVICO = CS.FK_SERVICO
LEFT JOIN
	HELP_SISTEMAS SIS ON SIS.ID_SISTEMA = CS.FK_SISTEMA
LEFT JOIN
	HELP_EQUIPAMENTOS E ON E.ID_EQUIPAMENTO = CS.FK_EQUIPAMENTO
WHERE
	H.ID_HISTORICO = (
		SELECT
			ID_HISTORICO
		FROM
			( SELECT
				H2.ID_HISTORICO,
				H2.FK_SOLICITACAO
			FROM
				HELP_HISTORICOS H2
			ORDER BY
				H2.DATA_INSERCAO DESC
			) TAB
		WHERE
			TAB.FK_SOLICITACAO = H.FK_SOLICITACAO
		AND
			ROWNUM = 1
	)
AND 
    FK_STATUS NOT IN ( 4, 9, 10 )
ORDER BY
	( CASE FK_STATUS WHEN 1 THEN 1 ELSE 2 END ),
	DATA_HISTORICO DESC,
	FK_STATUS
    