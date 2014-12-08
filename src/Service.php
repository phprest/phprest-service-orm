<?php namespace Phrest\Service\Rdbms;

use Phrest\Service\Serviceable;
use Phrest\Service\Configurable;
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
        if ( ! $config instanceof Config) {
            throw new \InvalidArgumentException('Wrong Config object');
        }

        $entityManager = EntityManager::create(
            $config->database,
            Setup::createAnnotationMetadataConfiguration(
                $config->annotationDirs, $config->dev, $config->proxyDir, $config->cache, false
            )
        );

        $container->singleton($config->getServiceName(), $entityManager);
    }
}
