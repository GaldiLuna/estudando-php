<?php

//CÉDULAS DISPONÍVEIS NO CAIXA ELETRÔNICO
$cedulas = [
    5,
    10,
    20,
    50,
    100,
    200
];

echo "Bem-vindo ao Caixa Eletrônico!\n";
echo "Cédulas disponíveis: " . implode(', ', $cedulas) . "\n"; //INFORMA AS CÉDULAS DISPONÍVEIS NO CAIXA ELETRÔNICO
echo "\n";

//SOLICITA O VALOR A DO SAQUE
$valorSaque = readline("Digite o valor do saque: ");

//VERIFICA SE O VALOR SOLICITADO É MÚLTIPLO DA MENOR CÉDULA DISPONÍVEL
if ($valorSaque % min($cedulas) !== 0) {
    die('O valor solicitado não pode ser sacado com as cédulas disponíveis. Por favor, tente outro valor.');
}

//AUXILIAR DO CÁLCULO DO VALOR RESTANTE
$valorRestante = $valorSaque;

//CÉDULAS UTILIZADAS PARA O SAQUE
$cedulasParaSaque = [];

//PRIORIZA AS CÉDULAS MAIORES
rsort($cedulas);

//ITERA AS CÉDULAS DISPONÍVEIS PARA O SAQUE
foreach ($cedulas as $cedula) {
    //VERIFICA O VALOR DA CÉDULA
    if ($cedula > $valorSaque) continue; //SE A CÉDULA FOR MAIOR QUE O VALOR DO SAQUE, PULA PARA A PRÓXIMA

    //CALCULA A QUANTIDADE DE CÉDULAS NECESSÁRIAS PARA O SAQUE
    $quantidade = floor($valorRestante / $cedula); 

    //ATUALIZA O VALOR RESTANTE DO SAQUE
    $valorRestante -= ($cedula * $quantidade); 

    //ADICIONA A CÉDULA E A QUANTIDADE NECESSÁRIA AO ARRAY
    $cedulasParaSaque[$cedula] = $quantidade; 

    //echo "Cédulas de R$ {$cedula}: {$quantidade}\n"; //TESTE DE EXIBIÇÃO DA QUANTIDADE DE CÉDULAS NECESSÁRIAS
}

//VALOR DO SAQUE
echo "\nSaque de R$ {$valorSaque} realizado com sucesso!\n";

//CÉDULAS RETORNADAS
foreach ($cedulasParaSaque as $cedula => $quantidade) {
    if ($quantidade > 0) { //SE A QUANTIDADE FOR MAIOR QUE ZERO, EXIBE A CÉDULA NA CONTAGEM ABAIXO
        echo " >> {$quantidade} cédula(s) de R$ {$cedula}\n"; //EXIBE A QUANTIDADE DE CÉDULAS UTILIZADAS NO SAQUE
    }
}

?>