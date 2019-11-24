<?php

namespace App\Util;

final class Util {

    public static function obterArrayDadosModel($classModel , $dados) {

        $model = new $classModel();

        $arrayData = [];

        foreach ($model->getFillable() as $data) {

            if (isset($dados[$data])) {
                $arrayData[$data] = $dados[$data];
            }

        }

        return $arrayData;
    }

    public static function obterMensagensValidacao($errors) {

        $mensagensErro = "";

        foreach ($errors as $mensagens) {

            foreach ($mensagens as $mensagem) {

                $mensagensErro .= $mensagem. " ";

            }

        }

        return $mensagensErro;
    }

    public static function retirarCaracteresEspeciais($string) {
        
        $novaString = preg_replace('/[^0-9]/is', '', $string);

        return $novaString;
    }

    public static function retirarEspacoString($string) {

        return preg_replace('/[\s]+/mu', ' ', $string);

    }

    public static function validaCPF($cpf) {
    
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;
            
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        
        return $cpf;
    }

    //Fórmula de Haversine
    public static function calcularDistanciaUsuarioEstabelecimento($latLongUsuario, $latLongEstabelecimento) {

        $lat1 = deg2rad($latLongUsuario['latitude']);
        $lat2 = deg2rad($latLongEstabelecimento['latitude']);
        $lon1 = deg2rad($latLongUsuario['longitude']);
        $lon2 = deg2rad($latLongEstabelecimento['longitude']);

        $dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );
        $dist = number_format($dist, 2, '.', '');

        return $dist;

    }

    //Formula verificando o Delta
    public static function calcularDistanciaUsuarioEstabelecimentoDelta($latLongUsuario, $latLongEstabelecimento) {

        $lat1 = deg2rad($latLongUsuario['latitude']);
        $lat2 = deg2rad($latLongEstabelecimento['latitude']);
        $lon1 = deg2rad($latLongUsuario['longitude']);
        $lon2 = deg2rad($latLongEstabelecimento['longitude']);

        $latD = $lat2 - $lat1;
        $lonD = $lon2 - $lon1;

        $dist = 2 * asin(sqrt(pow(sin($latD / 2), 2) +
        cos($lat1) * cos($lat2) * pow(sin($lonD / 2), 2)));
        $dist = $dist * 6371;

        return number_format($dist, 2, '.', '');

    }

    public static function orderArray($array, $indice) {

        usort($array, function($a, $b) {
            return $a['distancia'] <= $b['distancia'];
        });

    }

    public static function campoNuloOuVazio($campo) {

        return is_null($campo) || empty($campo);
    }

    public static function campoArrayNuloOuVazio($array, $campo) {

        return isset($array) && isset($array[$campo]);
    }

    public static function validarCampoArraySeVazio($request, $campo) {

        return isset($request) && isset($request[$campo]) && !empty($request[$campo]);
    }

    public static function array_sort($array, $on, $order = SORT_ASC) {

        $new_array = [];
        $sortable_array = [];

        if (count($array) > 0) {

            foreach ($array as $k => $v) {

                if (is_array($v)) {

                    foreach ($v as $k2 => $v2) {

                        if ($k2 == $on) {

                            $sortable_array[$k] = $v2;

                        }
                    }
                } else {

                    $sortable_array[$k] = $v;

                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }

            foreach ($sortable_array as $k => $v) {

                $new_array[$k] = $array[$k];

            }
        }

        return $new_array;
    }

    public static function gerarEmailEscondido($email) {

        $caracteresEscondidos = "";

        for ( $i = 1; $i <= strpos($email, "@"); $i++ ) {
            $caracteresEscondidos .= '*';
        }

        return substr($email, 0, 1) . $caracteresEscondidos . substr($email, strpos($email, "@"));

    }
}