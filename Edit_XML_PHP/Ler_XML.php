<?php
function Ler_XML() {
    // Exercício 2: Escreva um programa leia um arquivo XML no formato
    // que você gravou no exercício anterior, converta os dados para os 
    // tipos corretos e exiba na tela.

    if (is_file('App.xml')) {
        # code...
        $xml = simplexml_load_file('App.xml');

        $string_pessoa = "|--------------<Pessoa>--------------|\n".
                     "|  Nome: ".utf8_decode($xml->pessoa->nome)."\n".
                     "|  Data de nacimento: ".utf8_decode($xml->pessoa->data_nascimento)."\n".
                     "|  Altura: ".utf8_decode($xml->pessoa->altura)."\n";
        if (empty($xml->pessoa->dependente)) {
            # code...
            //var_dump($xml->pessoa->dependente);
            $string_dependente = "\n!!Essa Pessoa não tem dependentes!!\n";
        }else {
            # code...
            $string_dependente = '';

            foreach($xml->pessoa->dependente as $item){     
                $string_dependente = $string_dependente.
                                    "|--------------<Dependente>--------------|\n".
                                    "|  Nome: ".utf8_decode($item->nome)."\n".
                                    "|  Data de nacimento: ".utf8_decode($item->data_nascimento)."\n";
            }   
        }
        $string = $string_pessoa.$string_dependente;
    }else{
        $string = "\nDocumento vazio...\n";
    }
    
    return $string;
}