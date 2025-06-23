<?php

//TAMANHO DA SENHA
echo "\nGerador de Senhas\n";
echo "=================\n";
$tamanhoSenha = readline('Digite o tamanho da senha (entre 4 e 15): ');

//VERIFICA O TAMANHO DA SENHA
if ($tamanhoSenha < 4 || $tamanhoSenha > 15) {
    die("Tamanho inválido! A senha deve ter entre 6 e 10 caracteres.\n");
}

//CARACTERES DA SENHA
$caracteres = [];

//MAIÚSCULAS
if (readline('Incluir letras maiúsculas? (s/n): ') == 's') {
    $caracteres = array_merge($caracteres, range('A', 'Z'));
    
}

//MINÚSCULAS
if (readline('Incluir letras minúsculas? (s/n): ') == 's') {
    $caracteres = array_merge($caracteres, range('a', 'z'));
    
}

//NÚMEROS
if (readline('Incluir números? (s/n): ') == 's') {
    $caracteres = array_merge($caracteres, range(0, 9));
    
}

//ESPECIAIS
if (readline('Incluir caracteres especiais? (s/n): ') == 's') {
    //çÇ!?@#$%&*_-
    $caracteres[] = 'ç';
    $caracteres[] = 'Ç';
    $caracteres[] = '!';
    $caracteres[] = '?';
    $caracteres[] = '@';
    $caracteres[] = '#';
    $caracteres[] = '$';
    $caracteres[] = '%';
    $caracteres[] = '&';
    $caracteres[] = '*';
    $caracteres[] = '_';
    $caracteres[] = '-';
}

//VALIDAÇÃO DOS CARACTERES DA SENHA
if (empty($caracteres)) {
    die("Nenhum tipo de caractere selecionado! Por favor, selecione pelo menos um tipo de caractere.\n\n");
}

echo "<pre>";
print_r($caracteres);
echo "</pre>";

//VERIFICA SE O TAMANHO DA SENHA É MAIOR QUE O NÚMERO DE CARACTERES SELECIONADOS
while (count($caracteres) < $tamanhoSenha) {
    $caracteres = array_merge($caracteres, $caracteres); //DUPLICA OS CARACTERES ATÉ QUE O TAMANHO DA SENHA SEJA ATINGIDO
}

echo "<pre>";
print_r($caracteres);
echo "</pre>";

//MISTURAR OS CARACTERES
shuffle($caracteres);

echo "\n";

//GERAR A SENHA
echo "Senha gerada com sucesso!\n";
$senha = implode('', array_slice($caracteres, 0, $tamanhoSenha));

//EXIBIR A SENHA GERADA
echo "\nSua nova senha: {$senha}\n";
echo "\n";
//FIM DO PROGRAMA

?>