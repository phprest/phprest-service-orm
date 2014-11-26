<?php namespace Phrest\Service\Rdbms;

trait Getter
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function serviceRdbms()
    {
        return $this->getContainer()->get(Config::getServiceName());
    }

    /**
     * Returns the DI container
     *
     * @return \Orno\Di\Container
     */
    abstract protected function getContainer();
}
