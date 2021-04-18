<?php
/**
 * classe TCriteria
 * Esta classe provê uma interface utilizada para definição de critérios
 */

 class TCriteria extends TExpression
 {
     private ARRAY $expressions; //Armazena a lista de expressoes
     private ARRAY $operators;   //Armazena a lista de operadores
     private ARRAY $proprieties; //propriedades do critério
     
     /**
      * método add()
      *  adiciona uma expressoaao critério
      * @param $expression  = expressão (objeto TExpression)
      * @param $operator    = operador lógico de comparação 
      */

      public function add(TExpression $expression, $operator = self::AND_OPERATOR) //aqui usamos self parachar os atributos constantes da classe pai
      {
          // Na primeira vez, não precisamos de operador lógico para contatenar
          // Exemplo (valor > 13)
          if(empty($this->expressions)){
              unset($operator); //unset — Destrói a variável especificada
          }

          //agrega o resultado da expressão a lista de expressões
          $this->expressions[] = $expression;
          $this->operators[] = $operator;
      }

      /**
       * método dump ()
       * retorna a expressão final em string reta
       */
        public function dump(): string
        {
            $result = '';
            //Concatena a lista de expressões
            foreach ($this->expressions as $item => $expression){ // key => value 
                $operator = $this->operators[$item];
                //Concatena o operador coma respecitiva expressão
                $result .= $operator . $expression->dump() . ' ';
                $result = trim($result); //trim — Retira espaço no ínicio e final de uma string
                return "({$result})";
            }
        }

        /**
         *  método setProperty()
         *  define o valor de uma propriedade
         *  @param $property    = propriedade
         *  @param $value       = valor
         */

         public function setProperty(String $property, String $value): void
         {
             $this->proprieties[$property] = $value; //Criacão de uma lista (dicionario) onde $property => $value
         }

         /**
          * método getProperty()
          * retorna o valor de uam propriedade
          * @param $property = propriedade
          */

          public function getProperty(String $property): string
          {
              return $this->proprieties[$property];
          }
 }
?>