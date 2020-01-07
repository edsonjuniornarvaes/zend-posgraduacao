<?php

namespace Application\Model;

use Interop\Container\ContainerInterface;

/**
 * Class AssuntoTableFactory
 *
 * @package Application\Model
 */
class AssuntoTableFactory
{
    /**
     * @param \Interop\Container\ContainerInterface $container
     * @param $requestedName
     * @param array|null $options
     *
     * @return \Application\Model\AssuntoTable
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {
        $adapter = $container->get(\Zend\Db\Adapter\Adapter::class);
        $tableGateway = new \Zend\Db\TableGateway\TableGateway('assuntos', $adapter);

        return new AssuntoTable($tableGateway);
    }
}
