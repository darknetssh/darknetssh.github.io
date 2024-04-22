<?php
// URL da API
$url = 'https://baserow.recargasocial.top/api/database/rows/table/516/?user_field_names=true';

// Inicializa cURL
$ch = curl_init($url);

// Configura o cabeçalho de autorização
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Token DpQQXeD3Oq7P0IXbkeWHMKqCzOEccEwV'));

// Configura para receber a resposta
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Executa a solicitação
$response = curl_exec($ch);

// Fecha o cURL
curl_close($ch);

// Decodifica a resposta JSON para um objeto PHP
$data = json_decode($response);

// Mostra os dados
echo '<pre>';
print_r($data);
echo '</pre>';
?>
