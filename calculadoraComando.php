<?php

//RECEBE A EXPRESSÃO MATEMÁTICA
$expressao = readline("Digite uma expressão matemática: ");

//VERIFICA SE A EXPRESSÃO ENVIADA É VÁLIDA
if (preg_match('/[^0-9\ \+\-\*\/\(\)]/', $expressao)) {
    die ("A expressão é inválida! Por favor, verifique os dados enviados e use apenas números e operadores matemáticos.\n");
}

echo "\n";

//CALCULA O RESULTADO DA EXPRESSÃO
$resultado = eval("return $expressao;");

//VERIFICA SE O RESULTADO É VÁLIDO
if (!is_numeric($resultado)) {
    die("A expressão não pôde ser calculada! Por favor, verifique os dados enviados e use apenas números e operadores matemáticos.\n");
} 

//EXIBE A EXPRESSÃO E O SEU RESULTADO
echo "=========================\n";
echo "O resultado da expressão '$expressao' = $resultado\n";

?>