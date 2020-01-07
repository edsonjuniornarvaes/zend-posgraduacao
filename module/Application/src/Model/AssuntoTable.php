<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * Class AssuntoTable
 *
 * @package Application\Model
 */
class AssuntoTable
{
    /**
     * @var TableGatewayInterface
     */
    private $tableGateway;

    /**
     * AssuntoTable constructor.
     *
     * @param \Zend\Db\TableGateway\TableGatewayInterface $tableGateway
     */
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * @param \Application\Model\Assunto $model
     * @return void
     */
    public function save(Assunto $model)
    {
        $data = $model->toArray();
        $assunto = $this->get($model->codigo);
        if (empty($assunto)) {
            $this->tableGateway->insert($data);

            return;
        }
        $this->tableGateway->update($data, [
            'codigo' => $model->codigo,
        ]);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->tableGateway->select(null);
    }

    /**
     * @param $codigo
     *
     * @return mixed
     */
    public function get($codigo)
    {
        $result = $this->tableGateway->select(['codigo' => $codigo]);

        return $result->current();
    }

    /**
     * @param $codigo
     * @return void
     */
    public function delete($codigo)
    {
        $this->tableGateway->delete(['codigo' => $codigo]);
    }
}
