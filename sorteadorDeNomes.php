<?php

//ARRAY PARA GUARDAR A LISTA DE NOMES
$nomes = [];

do{
    echo "Menu de opções:\n";
    echo "1. Adicionar nome\n";

    if(count($nomes) >= 1) echo "2. Listar nomes\n";

    if(count($nomes) >= 2) echo "3. Sortear nome\n";

    echo "4. Sair\n";

    //OPÇÃO SELECIONADA PELO USUÁRIO
    $opcao = readline("Digite a opção desejada: ");

    echo "\n\n";

    //VALIDAÇÃO DA OPÇÃO DIGITADA
    switch($opcao){
        //ADICIONAR NOME
        case 1:
            $nomes[] = readline("Digite o nome a ser adicionado: ");
            echo "\n\n";
            break;

        //LISTAR NOMES
        case 2:
            if(count($nomes) >= 1){
                echo "Nomes na lista:\n";
                foreach($nomes as $nome){
                    echo " - " . $nome . "\n";
                }
                echo "\n\n";
            } 
            break;

        //SORTEAR
        case 3:
            if(count($nomes) >= 2){
                //SORTEIO DA POSIÇÃO DO ARRAY
                $indice = array_rand($nomes);

                //NOME SORTEADO
                echo "O nome sorteado foi: " . $nomes[$indice] . "\n";
                echo "\n\n";

                //REMOVER O NOME SORTEADO DA LISTA
                unset($nomes[$indice]);
                $nomes = array_values($nomes);
            } 
            break;

        case 4:
            echo "Saindo do programa...\n";
            break;

        default:
            echo "Opção inválida! Por favor, escolha uma opção válida.\n";
    }

}while(true && $opcao != 4);

?>