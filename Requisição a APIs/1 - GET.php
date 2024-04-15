<?php
// Passo 1: Defina a URL da API
$url = 'https://jsonplaceholder.typicode.com/posts';

// Passo 2: Faça uma solicitação HTTP para a API
$response = file_get_contents($url);

if ($response === false) {
    // Se houver um erro na solicitação
    die('Erro ao acessar a API.');
}

// Passo 3: Manipule a resposta
$data = json_decode($response, true);

if ($data === null) {
    // Se houver um erro ao decodificar JSON
    die('Erro ao decodificar a resposta JSON.');
}

// Passo 4: Exiba os dados
echo "<h1>Lista de Usuários</h1>";
foreach ($data as $user) {
    echo "<p>{$user['title']}</p>";
}
?>
