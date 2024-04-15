<?php
// URL da API para deletar um usuário específico (substitua {user_id} pelo ID do usuário que deseja deletar)
$url = 'https://reqres.in/api/users/1';

// Inicializa uma sessão cURL
$curl = curl_init();

// Configura as opções da requisição
curl_setopt($curl, CURLOPT_URL, $url); // Define a URL da requisição
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Define que a requisição será do tipo DELETE
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Define que a resposta da requisição será retornada como uma string

// Executa a requisição e armazena a resposta
$response = curl_exec($curl);

// Verifica se ocorreu algum erro durante a requisição
if ($response === false) {
    echo 'Erro ao fazer a requisição: ' . curl_error($curl);
    exit;
}

// Verifica o código de status da resposta para determinar se o usuário foi deletado com sucesso
$httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ($httpStatusCode === 204) {
    echo 'Usuário deletado com sucesso.';
} else {
    echo 'Erro ao deletar o usuário. Código de status HTTP: ' . $httpStatusCode;
}

// Fecha a sessão cURL
curl_close($curl);
?>
