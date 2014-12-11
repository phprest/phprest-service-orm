<?php namespace Phprest\Service\Orm\Command\Fixture;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

class Append extends Set
{
    /**
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('fixtures:append')
            ->setDescription('Loading fixtures.')
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
        $executor = new ORMExecutor($this->em, new ORMPurger());

        $loader->loadFromDirectory($this->mainDir);
        foreach ($this->dirs as $dir) {
            $loader->loadFromDirectory($dir);
        }

        $executor->execute($loader->getFixtures(), true);
    }
}
