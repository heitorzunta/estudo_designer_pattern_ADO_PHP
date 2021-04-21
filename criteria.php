<?php
//carrega as classes necessarias
require_once 'app.ado/TExpression.class.php';
require_once 'app.ado/TFilter.class.php';
require_once 'app.ado/TCriteria.class.php';

//aqui vemos exemplo de critério utilizando
// o operador lógico OR a idade de ser menor
// que 16 OU maior que 60

$criteria1 = new TCriteria();
$criteria1->add(new TFilter('idade', '<', 16));
$criteria1->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);

echo($criteria1->dump()).PHP_EOL;


// a idade deve estar dentro do conjunto
// (24,25,26) e deve estar fora do conjunto(10)
$criteria2 = new TCriteria();
$criteria2->add(new TFilter('idade', 'IN', [24, 25, 26]));
$criteria2->add(new TFilter('idade', 'NOT IN', array(10)));

echo($criteria2->dump()).PHP_EOL;

?>