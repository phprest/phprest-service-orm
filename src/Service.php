<?php namespace Phrest\Service\Rdbms;

use Phrest\Service\Contract\Serviceable;
use Phrest\Service\Contract\Configurable;
use Orno\Di\Container;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Service implements Serviceable
{
    /**
     * @param Container $container
     * @param Configurable $config
     *
     * @return void
     */
    public function register(Container $container, Configurable $config)
    {
        /** @var Config $config */

        $entityManager = EntityManager::create(
            $config->database,
            Setup::createAnnotationMetadataConfiguration($config->annotationDirs)
        );

        $container->singleton($config->getServiceName(), $entityManager);
    }
}
