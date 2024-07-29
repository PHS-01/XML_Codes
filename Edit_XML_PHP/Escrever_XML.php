<?php

function Escrever_XML($nome, $data_nascimento, $altura, $dependentes) {

    if ( !is_file('App.xml')) {
        # code...
        fopen('App.xml', 'w');
    }
    
    //Criação do XML
    $obj_xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><pessoas></pessoas>');

    //Adicionando dados da pessoa
    $pessoa = $obj_xml->addChild('pessoa');
    $pessoa->addChild('nome', $nome);
    $pessoa->addChild('data_nascimento', $data_nascimento);
    $pessoa->addChild('altura', $altura);

    //Adicionando dependentes
    foreach ($dependentes as $dependente_array) {
        $dependente = $pessoa->addChild('dependente');
        $dependente->addChild('nome', $dependente_array['nome']);
        $dependente->addChild('data_nascimento', $dependente_array['data_nascimento']);
    }
    
    //Cria um novo DOMDocument para formatação
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->preserveWhiteSpace = false;
    $dom->loadXML($obj_xml->asXML());
    $dom->formatOutput = true;
    
    //Escreve tudo no documento
    file_put_contents('App.xml',$dom->saveXML());
    
    echo "\n!!Dados Salvos com Sucesso!!\n";
    
    return $obj_xml;
}