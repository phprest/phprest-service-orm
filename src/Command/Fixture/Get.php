<?php namespace Phprest\Service\Orm\Command\Fixture;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\DataFixtures\Loader;

class Get extends Command
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
     * @param string $mainDir
     * @param array $dirs
     */
    public function __construct($mainDir, array $dirs = [])
    {
        $this->mainDir = $mainDir;
        $this->dirs = $dirs;

        parent::__construct();
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('fixtures:get')
            ->setDescription('Get available fixtures.')
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

        $loader->loadFromDirectory($this->mainDir);
        foreach ($this->dirs as $dir) {
            $loader->loadFromDirectory($dir);
        }

        foreach ($loader->getFixtures() as $fixtureName => $fixture) {
            $output->writeln($fixtureName);
        }
    }
}
