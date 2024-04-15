<?php
// URL da API que requer autenticação
$url = 'https://3c.fluxoti.com/api/v1/campaigns?paused=false&page=1&api_token=';

// Token de acesso
$token = 'd0NLCpTnvtsY1gQu7S38RyF47fOjnHknynBjGzWxCwpXOJqXaNwWDrGqFomq';

// Inicializa uma sessão cURL
$curl = curl_init();

// Configura as opções da requisição
curl_setopt($curl, CURLOPT_URL, $url); // Define a URL da requisição
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Define que a resposta da requisição será retornada como uma string

// Define o cabeçalho de autenticação com o token de acesso
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $token
));

// Executa a requisição e armazena a resposta
$response = curl_exec($curl);

// Verifica se ocorreu algum erro durante a requisição
if ($response === false) {
    echo 'Erro ao fazer a requisição: ' . curl_error($curl);
    exit;
}

// Verifica o código de status da resposta
$httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ($httpStatusCode === 200) {
    echo 'Dados da API: ' . $response;
} else {
    echo 'Erro ao acessar a API. Código de status HTTP: ' . $httpStatusCode;
}

// Fecha a sessão cURL
curl_close($curl);
?>
