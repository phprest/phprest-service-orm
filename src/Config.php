<?php namespace Phprest\Service\Orm;

use Phprest\Service\Configurable;
use Phprest\Service\Orm\Config\Fixture;
use Phprest\Service\Orm\Config\Migration;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\ArrayCache;

class Config implements Configurable
{
    /**
     * @var boolean
     */
    public $dev = false;

    /**
     * @var string
     */
    public $proxyDir;

    /**
     * @var Cache
     */
    public $cache;

    /**
     * @var array
     *
     * @see http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html
     */
    public $database = [];

    /**
     * @var Migration
     */
    public $migration;

    /**
     * @var Fixture
     */
    public $fixture;

    /**
     * Your entites' directory path
     *
     * @var array
     *
     * @see http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#obtaining-the-entitymanager
     */
    public $annotationDirs = [];

    /**
     * @param array $database
     * @param array $annotationDirs
     *
     * @see http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html
     * @see http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#obtaining-the-entitymanager
     */
    public function __construct(array $database, array $annotationDirs)
    {
        $this->database = $database;
        $this->annotationDirs = $annotationDirs;

        $this->cache = new ArrayCache();
    }

    /**
     * @return string
     */
    static public function getServiceName()
    {
        return 'orm';
    }
}
