<?php
 # enviarEmail.php - Instancia a classe de configura��es emailHandler que, por sua vez, faz uso da classe PHPMailer.
 #Tamb�m registra automaticamente logs e-mails enviados.
      
sc_include_library("sys", "semae", "sendMails/emailHandler.class.php", true, true);
function enviarEmail($destinatariosEnviaEmail, $assuntoEnviaEmail, $mensagemEnviaEmail, $aliasEnviaEmail) {
    $logDestinatarios = implode(', ', $destinatariosEnviaEmail);
    $logAplicacao = $this->Ini->nm_cod_apl;
    $logServidor = strstr($_SERVER["SERVER_NAME"], '.', true);

    try {
        $objMail = new EmailHandler();
        if ($objMail->enviarEmail($destinatariosEnviaEmail, $assuntoEnviaEmail, $mensagemEnviaEmail, $aliasEnviaEmail)) {
            $stmtInsertLogEmail = "
                INSERT INTO LOGS_EMAILS (
                    DESTINATARIOS,
                    APLICACAO,
                    SUCESSO,
                    SERVIDOR
                ) VALUES (
                    '$logDestinatarios',
                    '$logAplicacao',
                    'S',
                    '$logServidor'
                )
            ";
            sc_exec_sql($stmtInsertLogEmail);
        }
    } catch (Exception $e) {
        $stmtInsertLogEmail = "
            INSERT INTO LOGS_EMAILS (
                DESTINATARIOS,
                APLICACAO,
                SUCESSO,
                SERVIDOR,
                MENSAGEM_ERRO
            ) VALUES (
                '$logDestinatarios',
                '$logAplicacao',
                'N',
                '$logServidor',
                '" . $e->getMessage() . ", c�digo: " . $e->getCode() . "'
            )
        ";
        sc_exec_sql($stmtInsertLogEmail);
        return false;
    }
    return true;
}

?>