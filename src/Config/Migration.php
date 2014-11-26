<?php namespace Phrest\Service\Rdbms\Config;

class Migration
{
    /**
     * @var string
     */
    public $name = 'Application Migrations';

    /**
     * @var string
     */
    public $namespace = 'Application\Migrations';

    /**
     * @var string
     */
    public $tableName = 'migration_versions';

    /**
     * Main migration directory's path
     *
     * @var string
     */
    public $mainDir = '';

    /**
     * Individual migration directories' paths
     *
     * @var array
     */
    public $individualDirs = [];

    /**
     * @param string $mainDir Main migration directory's path
     * @param array $individualDirs
     */
    public function __construct($mainDir, $individualDirs = [])
    {
        $this->mainDir = $mainDir;
        $this->individualDirs = $individualDirs;
    }
}