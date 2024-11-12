<?php

######## EXEMPLO DE DOWNLOAD DE UM ARQUIVO (HOSPEDADO EM UM SERVIDOR REMOTO) PARA DENTRO DO DIRETORIO DESSA PR�PRIA APLICACAO ########
$url ='https://sgi.semaepiracicaba.sp.gov.br/downloads/suporte2023.exe'; // Initialize a file URL to the variable
$ch = curl_init($url); // Initialize the cURL session
$dir = './';// Initialize directory name where file will be save (will save the file within the itself folder where the application is located)
$file_name = basename($url);// Use basename() function to return the base name of file
$save_file_loc = $dir . $file_name;// Save file into file location
$fp = fopen($save_file_loc, 'wb'); //create a file with permissions of write and binary

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Use se a URL tiver protocolo SSL (https)

if (curl_exec($ch) === false) { //execute cURL
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Operation completed without any errors';
}

curl_close($ch);// Closes a cURL session and frees all resources

fclose($fp);// Close file


######## EXEMPLO DE DOWNLOAD DE UM ARQUIVO (HOSPEDADO EM UM SERVIDOR REMOTO) PARA A M�QUINA LOCAL DO NAVEGADOR (CLIENTE) ########

// URL do arquivo a ser baixado
$file_url = 'https://sgi.semaepiracicaba.sp.gov.br/downloads/suporte2023.exe';
// Nome do arquivo ap�s o download
$file_name = 'suporte2023.exe';

//Configura os cabe�alhos HTTP para for�ar o download, especificando o tipo MIME type e definindo o cabe�alho com o nome do arquivo
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: Binary');
header("Content-disposition: attachment; filename=\"".$file_name."\"");

// Usa a biblioteca cURL para obter o conte�do da URL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $file_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Use se a URL tiver SSL (https)

$data = curl_exec ($ch);
curl_close ($ch);

// Escreve na sa�da do buffer os dados do arquivo (presentes no conte�do da URL), o que far� com que o navegador do cliente inicie o download do arquivo especificado.
echo $data;

?>