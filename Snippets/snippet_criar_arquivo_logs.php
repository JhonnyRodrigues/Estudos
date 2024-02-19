<?php

#ARQUIVO LOGS
// unlink("../logs/lembretes_solicitacoes.txt");exit;
if (!is_dir('../logs')) {
    if (!mkdir('../logs', 0755)) {
        errorMessage("Falha ao criar o diret�rio que armazena os logs de envio de e-mails lembretes aos solicitantes.", 5);
    } else {
        // echo 'Diret�rio criado com sucesso!';
        $file = fopen("../logs/lembretes_solicitacoes.txt", "a+"); //modo de criacao
        if (!$file) {
            errorMessage("Falha ao abrir o arquivo que armazena os logs de envio de e-mails lembretes aos solicitantes.", 6);
        } else if (filesize("../logs/lembretes_solicitacoes.txt") == 0) {
            fwrite($file, "DATA e HORA --- USU�RIO LOGADO --- E-MAIL DO DESTINAT�RIO"); //cabecalho
        }
    }
} else {
    // echo 'O diret�rio j� existe.';
    $file = fopen("../logs/lembretes_solicitacoes.txt", "a+"); //modo de criacao
    if (!$file) {
        errorMessage("Falha ao abrir o arquivo que armazena os logs de envio de e-mails lembretes aos solicitantes.", 6);
    } else if (filesize("../logs/lembretes_solicitacoes.txt") == 0) {
        fwrite($file, "DATA e HORA --- USU�RIO LOGADO --- E-MAIL DO DESTINAT�RIO"); //cabecalho
    }
}
fwrite($file, "\n" . date('d/m/Y H:i:s') . ' - ' . $_SESSION['usr_login'] . ' - ' . {datasetSolicitAguardando}->fields['EMAIL']);
fclose($file);

?>