<?php namespace Phprest\Service\Orm;

use Phprest\Service\Serviceable;
use Phprest\Service\Configurable;
use League\Container\ContainerInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Service implements Serviceable
{
    /**
     * @param ContainerInterface $container
     * @param Configurable $config
     *
     * @return void
     */
    public function register(ContainerInterface $container, Configurable $config)
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

        $container->add($config->getServiceName(), $entityManager);
    }
}
