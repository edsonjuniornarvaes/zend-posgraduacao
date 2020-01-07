<?php

namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class SolicitanteControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $solicitanteTable = $container->get(\Application\Model\SolicitanteTable::class);

        return new SolicitanteController($solicitanteTable);
    }
}
