<?php namespace Phrest\Service\Rdbms;

use Phrest\Service\Configurable;
use Phrest\Service\Rdbms\Config\Migration;

class Config implements Configurable
{
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
     * Your entites' directory path
     *
     * @var array
     *
     * @see http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#obtaining-the-entitymanager
     */
    public $annotationDirs = [];

    /**
     * @param array $database
     * @param Migration $migration
     * @param array $annotationDirs
     *
     * @see http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html
     * @see http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#obtaining-the-entitymanager
     */
    public function __construct(array $database, Migration $migration, array $annotationDirs)
    {
        $this->database = $database;
        $this->migration = $migration;
        $this->annotationDirs = $annotationDirs;
    }

    /**
     * @return string
     */
    static public function getServiceName()
    {
        return 'rdbms';
    }
}
