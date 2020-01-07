<?php

namespace Application\Model;

class Solicitante
{
    public $cpf;
    public $nome;
    public $municipio;
    public $uf;
    public $email;
    public $ddd;
    public $telefone;

    public function exchangeArray($array)
    {
        foreach ($array as $nome => $valor) {
            $this->$nome = $valor;
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function hasData()
    {
        $hasData = true;

        foreach (get_object_vars($this) as $valor) {
            if (empty($valor)) {
                $hasData = false;

                break;
            }
        }

        return $hasData;
    }
}
