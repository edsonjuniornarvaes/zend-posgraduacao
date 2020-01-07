<?php

namespace Application\Model;

use Interop\Container\ContainerInterface;

class SolicitanteTableFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get(\Zend\Db\Adapter\Adapter::class);
        $tableGateway = new \Zend\Db\TableGateway\TableGateway('solicitantes', $adapter);

        return new SolicitanteTable($tableGateway);
    }
}
