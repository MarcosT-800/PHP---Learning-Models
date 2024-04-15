<?php
// URL da API para criar um novo usuário
$url = 'https://reqres.in/api/users';

// Dados do usuário a serem enviados como parte da requisição POST
$userData = array(
    'name' => 'John Doe',
    'job' => 'Developer'
);

// Inicializa uma sessão cURL
$curl = curl_init();

// Configura as opções da requisição
curl_setopt($curl, CURLOPT_URL, $url); // Define a URL da requisição
curl_setopt($curl, CURLOPT_POST, true); // Define que a requisição será do tipo POST
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

// Decodifica a resposta JSON em um array associativo
$result = json_decode($response, true);

// Verifica se houve erro ao decodificar o JSON
if ($result === null) {
    echo 'Erro ao decodificar a resposta JSON.';
    exit;
}

// Exibe o resultado da criação do usuário
echo 'ID do Novo Usuário: ' . $result['id'] . '<br>';
echo 'Nome: ' . $result['name'] . '<br>';
echo 'Job: ' . $result['job'] . '<br>';

// Fecha a sessão cURL
curl_close($curl);
?>
