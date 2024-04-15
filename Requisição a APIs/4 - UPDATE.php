<?php
// URL da API para atualizar um usuário específico (substitua {user_id} pelo ID do usuário que deseja atualizar)
$url = 'https://reqres.in/api/users/{user_id}';

// Dados do usuário a serem atualizados (substitua com os dados que você quer atualizar)
$userData = array(
    'name' => 'Novo Nome',
    'job' => 'Nova Profissão'
);

// Inicializa uma sessão cURL
$curl = curl_init();

// Configura as opções da requisição
curl_setopt($curl, CURLOPT_URL, $url); // Define a URL da requisição
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT'); // Define que a requisição será do tipo PUT
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($userData)); // Define os dados a serem enviados como JSON
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Define que a resposta da requisição será retornada como uma string

// Define os cabeçalhos da requisição para indicar que estamos enviando JSON
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($userData))
));

// Executa a requisição e armazena a resposta
$response = curl_exec($curl);

// Verifica se ocorreu algum erro durante a requisição
if ($response === false) {
    echo 'Erro ao fazer a requisição: ' . curl_error($curl);
    exit;
}

// Verifica o código de status da resposta para determinar se o usuário foi atualizado com sucesso
$httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ($httpStatusCode === 200) {
    echo 'Usuário atualizado com sucesso.';
} else {
    echo 'Erro ao atualizar o usuário. Código de status HTTP: ' . $httpStatusCode;
}

// Fecha a sessão cURL
curl_close($curl);
?>
