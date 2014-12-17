<?php namespace Phprest\Service\Orm\Command\Fixture;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;

class Set extends Command
{
    /**
     * @var string
     */
    protected $mainDir;

    /**
     * @var array
     */
    protected $dirs = [];

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @param string $mainDir
     * @param array $dirs
     * @param EntityManager $em
     */
    public function __construct($mainDir, array $dirs = [], EntityManager $em)
    {
        $this->mainDir = $mainDir;
        $this->dirs = $dirs;
        $this->em = $em;

        parent::__construct();
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('fixtures:set')
            ->setDescription('Truncation db, loading fixtures.')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $loader = new Loader();
        $purger = new ORMPurger();
        $purger->setPurgeMode(ORMPurger::PURGE_MODE_TRUNCATE);
        $executor = new ORMExecutor($this->em, $purger);

        $loader->loadFromDirectory($this->mainDir);
        foreach ($this->dirs as $dir) {
            $loader->loadFromDirectory($dir);
        }

        $executor->execute($loader->getFixtures());
    }
}
