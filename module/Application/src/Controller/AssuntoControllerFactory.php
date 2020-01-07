<?php

namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class AssuntoControllerFactory
 *
 * @package Application\Controller
 */
class AssuntoControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {
        $assuntoTable = $container->get(\Application\Model\AssuntoTable::class);

        return new AssuntoController($assuntoTable);
    }
}
