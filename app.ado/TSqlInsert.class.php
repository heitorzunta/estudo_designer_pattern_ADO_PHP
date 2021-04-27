<?php
/**
 * classe TSqlInsert
 * Esta classe provê meios para a manipulaã de uma instrução do INSERT no banco de dados
 */


final class TSqlInsert extends TSqlInstruction
{

    private Array $columnValues;

    /**
     * método setRowData()
     * Atribui valores à determinadas colunas no banco de dados  que serão inseridas
     * @param $column   = coluna da tabela
     * @param $value    = valor a ser armazenado
     */

    public function setRowData(String $column, $value)
    {
        //Verifica se é um dado escalar (inteiro, String)/não vetor
        if (is_scalar($value)){

            //Verifica se é uma string não vazia
            if(is_string($value)){
                //Sanitizando values adicionanando / em caracteres especiais
                $value = addslashes($value);
                //Como é um string o valor sera implementado entre ''
                $this->columnValues[$column] = "'$value'";
            }

            //Verifica se ele é um booleano
            else if (is_bool($value)){
                $value = $value ? 'TRUE' : 'FALSE';
                //adiciona TRUE ou FALSE
                $this->columnValues[$column] = $value;
            }

            //Verificar se é um NULL
            else if (is_null($value)){
                $this->columnValues[$column] = 'NULL';
            }
            //Verifica se é um numero
            else {
                $this->columnValues[$column] = $value;
            }

        }
    }

    /**
     * Como a classe TsqlInstruction é a única classe que não possui
     * o método setCriteria() iremos disparar uma exceção para quem
     * tentar utiliza-la
     */
    public function setCriteria(TCriteria $criteria): void
    {
        throw new Exception("Este método não pode ser chamado nesta classe: " . __CLASS__);
    }

    /**
     * método getInstuction()
     * retorna o instrução SQL do INSERT
     */
    public function getInstuction() 
    {

        $keys = implode(', ', array_keys($this->columnValues));
        $values = implode(', ', array_values($this->columnValues));

        $sql = "INSERT INTO {$this->entity} ({$keys}) VALUES ({$values})";
        return $this->sql = $sql;
    }
}
?>
