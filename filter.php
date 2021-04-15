<?php
/**
 * Teste da classe TFilter.class.php
 */

include 'app.ado/TExpression.class.php';
include 'app.ado/TFilter.class.php';

// Filtro de String
$filtro1 = new TFilter('data', '=', '2021-05-15');

//Filtro de Salario
$filtro2 = new TFilter('salario', '>', 3000.50);

//Filtro de Array
$filtro3 = new TFilter('sexo', 'IN', array('M', 'F'));

//Filtro nulo
$filtro4 = new TFilter('contato', 'IS NOT', NULL);

//Filtro boolean
$filtro5 = new TFilter('ativo', '=', TRUE);

echo ($filtro1->dump()) . PHP_EOL;
echo ($filtro2->dump()) . PHP_EOL;
echo ($filtro3->dump()) . PHP_EOL;
echo ($filtro4->dump()) . PHP_EOL;
echo ($filtro5->dump()) . PHP_EOL;
?>