<?php

function validaCPF($cpf){

        $digito1 = 0;
        $digito2 = 0;
        // Remove tudo que não for número
        $cpf = preg_replace('/\D/', '', $cpf);  

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return "<br>$cpf - CPF inválido (tamanho incorreto)\n";
        }
        
        // Verifica se o CPF tem todos os números iguais (inválido)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return "<br>$cpf - CPF inválido (sequência repetida)\n";
        }

        // Calcula 1 digito
        for ($i=0, $k=10; $i <= 8; $i++, $k--) {
            $digito1 += (int)$cpf[$i] * ($k);
            }
        $digito1 % 11 <= 1 ? $digito1 = 0 : $digito1 = 11 - $digito1 % 11;
        
        // Calcula 2 digito
        for ($i=0, $k=11; $i <= 9; $i++, $k--) {     
            $digito2 += (int)$cpf[$i] * $k;
        }
        $digito2 % 11 <= 1 ? $digito2 = 0 : $digito2 = 11 - $digito2 % 11; 
    
        if((int)$digito1 == (int)$cpf[9] && (int)$digito2 == (int)$cpf[10]){
            return 0;
        }
        else{    
            return 1;
        }
    }

?>