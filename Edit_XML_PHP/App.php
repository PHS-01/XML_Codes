<?php
//Includes para arquivos com funçoes do xml(Ler/Escrever)
include 'Escrever_XML.php';
include 'Ler_XML.php';

// Exercício 1: Escreva um programa que peça como entrada (via readline) os seguintes dados de uma pessoa:
// Nome (string), data de nascimento (string), altura (float) e dependentes (array).
// Cada dependente deve ter um nome (string) e data de nascimento (string).
// Em seguida, exiba na tela a serialização em XML desses dados.


//Inicialização da Variavel
$variable = 0;

while ($variable != '1' || $variable != '2' || $variable != '3'){

    echo "\n|--------<Sistema de Cadastro de Pessoa via XML>--------|\n";
    echo "|-----------<Cadastrar Pessoa            (1)>-----------|\n";
    echo "|-----------<Mostra Pessoas Cadastradas  (2)>-----------|\n";
    echo "|-----------<Limpar Arquivo XML          (3)>-----------|\n";
    echo "|-----------<Sair                        (4)>-----------|\n";
    echo "|-------------------------------------------------------|\n";
    $variable = (string) readline();

    switch ($variable) {
        case '1':
            //Imputs do Sitema para Pessoa
            $nome = (string) readline('Digite o nome da pessoa: ');
            $data_nascimento = (string) readline('Digite a data de nascimento da pessoa: ');
            $altura =  (float) readline('Digite a altura da pessoa: ');

            //Array para amazenar dependentes da Pessoa
            $dependentes  = array();

            //Input de verificação
            $a = (string) strtolower(readline('A pessoa tem dependentes? (s/n): '));

            while ($a != 'n') {
                if ($a != 's') {
                    echo "Entrada invalida!! \n";
                    $a = (string) strtolower(readline('A pessoa tem dependentes? (s/n): '));
                }else{
                    //Imputs do Sitema para Dependentes da Pessoa
                    $nome_dependente = (string) readline('Digite o nome do dependente: ');
                    $data_nascimento_dependente = (string) readline('Digite a data de nascimento do dependente: ');

                    $dependente = array("nome" => $nome_dependente,"data_nascimento" => $data_nascimento_dependente);
                    array_push($dependentes, $dependente);

                    $a = (string) strtolower(readline('Tem mais dependentes? (s/n): '));
                } 
            }

            //Chamada de função para escrever o XML
            $xmlString = Escrever_XML($nome, $data_nascimento, $altura, $dependentes);
            // var_dump($xmlString);
            break;

        case '2':
            # code...
            echo Ler_XML();
            break;

        case '3':
            if (is_file('App.xml')) {
                # code...
                unlink('App.xml');
                echo "\n!!Arquivo limpo com Sucesso!!\n";
            }else{
                echo "\n!!O Arquivo Não Existe!!\n";
            }
            break;

        case '4':
            echo "\nSaindo do Sitema ...\n";
            exit;
        
        default:
            echo "\n!!Entrada invalida!!\n";
            break;
    }
}