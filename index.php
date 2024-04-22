<?php
header('Content-Type: application/json');  // Define o cabeçalho como JSON

// URL da API e cabeçalho de autorização
$url = 'https://baserow.recargasocial.top/api/database/rows/table/516/?user_field_names=true';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Token DpQQXeD3Oq7P0IXbkeWHMKqCzOEccEwV'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decodifica a resposta JSON para um array associativo
$data = json_decode($response, true);

// Processa os dados para adaptar ao formato desejado
$jsonOutput = [
    "number" => "{{remoteJid}}",
    "options" => [
        "delay" => 1200,
        "presence" => "composing"
    ],
    "listMessage" => [
        "title" => "Olá , {{Nome}} Bem vindo\n\nSaldo: {{Saldo}}",
        "description" => "Aqui você poderá Comprar Suas Contas Premium com os melhores preços do mercado",
        "buttonText" => "ESCOLHER",
        "footerText" => "Escolha uma opção abaixo para continuar seu atendimento",
        "sections" => [
            [
                "title" => "Escolha A Opção desejada",
                "rows" => []
            ],
            [
                "title" => "OUTROS MENUS",
                "rows" => [
                    [
                        "title" => "Aqui um",
                        "description" => "R$ 10",
                        "rowId" => "lja1"
                    ],
                    [
                        "title" => "Aqui outro",
                        "description" => "Nada ainda",
                        "rowId" => "lja2"
                    ]
                ]
            ]
        ]
    ]
];

// Adiciona as categorias dinâmicas da API à seção "Escolha A Opção desejada"
foreach ($data['data']['results'] as $result) {
    $jsonOutput['listMessage']['sections'][0]['rows'][] = [
        "title" => $result['Nome'],
        "description" => "R$ " . $result['Valor'],
        "rowId" => (string) $result['id']
    ];
}

// Retorna a resposta JSON formatada
echo json_encode($jsonOutput, JSON_PRETTY_PRINT);
?>
