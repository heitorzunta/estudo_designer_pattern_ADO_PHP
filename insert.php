<?php

/**
 * Função __autoload()
 * carrrega uma classe quanto elaé necessária, ou seja, quando ela é instancia pela
 * primeira vez
 */

 // arrumar AUTOLOAD

function __autoload($classe){
   $rootPath = $_SERVER['DOCUMENT_ROOT'];

   $filePath = "app.ado/{$classe}.class.php";

    if(file_exists($filePath)){
        require_once $filePath;
    }
 }

// require_once 'app.ado/TExpression.class.php';
// require_once 'app.ado/TFilter.class.php';
// require_once 'app.ado/TCriteria.class.php';
// require_once 'app.ado/TSqlInstruction.class.php';
// require_once 'app.ado/TSqlInsert.class.php';

//define o LOCALE do sistema, para permitir ponto decimal
setlocale(LC_NUMERIC, 'POSIX');

//Cria uma função insert
$insert = new TSqlInsert();

//Define o nome da entidade
$insert->setEntity('aluno');

//Atribui o valor de uma coluna
$insert->setRowData('id',   3);
$insert->setRowData('nome',  'Pedro Cardoso');
$insert->setRowData('fone', '(67)9999-9999');
$insert->setRowData('nascimento', '1995-04-12');
$insert->setRowData('sexo', 'M');
$insert->setRowData('serie',    '4');
$insert->setRowData('mensalidade',  280.40);
//Processa a instrução SQL
echo ($insert->getInstuction()).PHP_EOL;


?>