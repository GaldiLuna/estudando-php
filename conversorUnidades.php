<?php

//UNIDADES VÁLIDAS PARA O SISTEMA DE CONVERSÃO
$unidades = [
    'mm' => 1, //milímetros
    'cm' => 10, //centímetros
    'pol' => 25.4, //polegadas
    'pe' => 304.8, //pés
    'jd' => 914.4, //jardas
    'mt' => 1000, //metros
    'km' => 1000000, //quilômetros
    'mi' => 1609344, //milhas
];

//TEXTO DAS UNIDADES VÁLIDAS
$unidadesValidas = implode(', ', array_keys($unidades));

//VALIDAÇÃO DA UNIDADE BASE DE ENTRADA
do {
    //SOLICITA A UNIDADE BASE DE ENTRADA AO USUÁRIO
    $unidadeBase = readline('Digite a unidade base de entrada ('.$unidadesValidas.'): ');

    //VERIFICA SE A UNIDADE DIGITADA É VÁLIDA
    if (!isset($unidades[$unidadeBase])) {
        echo "Unidade inválida! Por favor, digite uma unidade válida!\n\n";
    }
} while (!isset($unidades[$unidadeBase])); //CONTINUA PEDINDO ATÉ QUE UMA UNIDADE VÁLIDA SEJA DIGITADA

//VALIDAÇÃO DO VALOR A SER CONVERTIDO
do {
    //SOLICITA O VALOR DA UNIDADE BASE DE ENTRADA AO USUÁRIO
    $valorBase = readline('Digite o valor a ser convertido: ');

    //VERIFICA SE O VALOR É VÁLIDO
    if (!is_numeric($valorBase)) {
        echo "Valor inválido! Por favor, digite valores numéricos!\n\n";
    }
} while (!is_numeric($valorBase)); //CONTINUA PEDINDO ATÉ SATISFAZER

//VALOR EM MILÍMETROS
$valorEmMilimetros = $valorBase * $unidades[$unidadeBase];

echo "\nResultados:\n";

//IMPRIME OS RESULTADOS DA CONVERSÃO
foreach ($unidades as $unidade => $fator) {
    //IGNORA A IMPRESSÃO DA UNIDADE SOLICITADA
    if ($unidade == $unidadeBase) continue;

    //CALCULA O VALOR CONVERTIDO
    $valorConvertido = $valorEmMilimetros / $fator;

    //EXIBE O RESULTADO DA CONVERSÃO
    echo " > {$valorBase} {$unidadeBase} é igual a {$valorConvertido} {$unidade}\n";
}

?>