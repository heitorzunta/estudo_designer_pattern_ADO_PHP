<?php

/**
 * Classe TFilter
 * Esta classe provê uma interface para definição dos filtros de seleção
 */

class TFilter extends TExpression {

	private string $variable;
	private string $operator;
	private $value;

	public function __construct(string $variable, string $operator, $value) {
		$this->variable = $variable;
		$this->operator = $operator;
		$this->value = $this->transform($value);
	}

	private function transform($value): string{
		$result = "";
		//Verfica se é um array
		if (is_array($value)) {
			//Percorre todos os itens do Array
			foreach ($value as $item) {
				//verifica se é inteiro
				if (is_numeric($item)) {
					$foo[] = $item;
					//Verifica se é string
				} else if (is_string($item)) {
					$foo[] = "'$item'";
				}
			}
			//Cria uma string adcionando , a cada elemento do vetor
			$result = '(' . implode(',', $foo) . ')';
		}
		//E um string
		else if (is_string($value)) {
			//Adiciona a string ''
			$result = "'$value'";
		}
		//E nulo?
		elseif (is_null($value)) {
			$result = 'NULL';
		}
		//E bool?
		else if (is_bool($value)) {
			$result = $value ? 'TRUE' : 'FALSE';
		}
		//Senão é número
		else {
			$result = $value;
		}

		return $result;
	}

	/**
	 * Implementando o método dump()
	 * Lembrando que ele retorna uma string "montando"
	 * a regra SQL
	 */

	public function dump() {
		return "{$this->variable} {$this->operator} {$this->value}";
	}

}
?>

