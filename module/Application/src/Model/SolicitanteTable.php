<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class SolicitanteTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function save(Solicitante $model)
    {
        $data = $model->toArray();

        $solicitante = $this->get($data['cpf']);

        if (empty($solicitante)) {
            $this->tableGateway->insert($data);
        } else {
            $this->tableGateway->update($data, [
                'cpf' => $data['cpf'],
            ]);
        }
    }

    public function getAll()
    {
        return $this->tableGateway->select(null);
    }


    public function delete($cpf)
    {
        $this->tableGateway->delete(['cpf' => $cpf]);
    }

    public function get($cpf)
    {
        $result = $this->tableGateway->select(['cpf' => $cpf]);

        return $result->Current();
    }
}

