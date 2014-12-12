<?php namespace Phprest\Service\Orm\Config;

class Fixture
{
    /**
     * Main migration directory's path
     *
     * @var string
     */
    public $mainDir;

    /**
     * Individual migration directories' paths
     *
     * @var array
     */
    public $individualDirs = [];

    /**
     * @param string $mainDir Main fixture directory's path
     * @param array $individualDirs
     */
    public function __construct($mainDir, $individualDirs = [])
    {
        $this->mainDir = $mainDir;
        $this->individualDirs = $individualDirs;
    }
}
