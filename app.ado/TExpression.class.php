<?php
/**
 * Classe TExpression
 * Classe abstrata para gerenciar as expressões
 */

 abstract class TExpression
 {
    //Operadores Lógicos
    const AND_OPERATOR = 'AND ';
    const OR_OPERATOR = 'OR ';

    abstract public function dump(): string;

 }
?>