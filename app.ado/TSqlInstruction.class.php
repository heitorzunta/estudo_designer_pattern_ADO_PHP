<?php
/**
 * classe TSqlInstruction
 * Esta classe provê os métodos em comum entre todas as instruções
 * SQL (SELECT, INSERT, DELETE e UPDATE)
 */
 abstract class TSqlInstruction
 {
     protected string $sql; //armazena a instrução SQL
     protected TCriteria $criteria; //Armazena o objeto Criterios
     protected string $entity; //Armazena o nome da tabela a ser utilizada

    /**
    * Método setEntity()
    * define o nome da tabela (entidade) manipulada pela instrução SQL
    * @param $entity = tabela
    */
    final public function setEntity($entity): void
    {
        $this->entity = $entity;
    }

    /**
     * Método getEntity()
     * exibe o nome da tabela (entidade) manipulada pela instrução SQL
     */
    final public function getEntity(): string
    {
        return $this->entity;
    }

    /**
     * Método setCriteria()
     * Define um criterio de seleção de dados através da composição de um objeto
     * do tipo TCriteria()
     * @param $criteria = objeto do tipo TCriteria()
     */
    public function setCriteria(TCriteria $criteria): void
    {
        $this->criteria = $criteria;
    }

    /**
     * Método getInstruction()
     * declarando -o como 'abstract'a fim de obrigar sua declaração nas classes filhas
     */
    abstract function getInstuction();
 }
?>