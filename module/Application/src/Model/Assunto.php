<?php

namespace Application\Model;

/**
 * Class Assunto
 *
 * @package Application\Model
 */
class Assunto
{
    public $codigo;
    public $assunto;
    public $detalhes;

    /**
     * @param $array
     * @return void
     */
    public function exchangeArray($array)
    {
        foreach ($array as $nome => $valor) {
            $this->{$nome} = $valor;
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return bool
     */
    public function hasData()
    {
        return !empty($this->assunto);
    }
}
