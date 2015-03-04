<?php namespace Phprest\Service\Orm;

trait Getter
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function serviceOrm()
    {
        return $this->getContainer()->get(Config::getServiceName());
    }

    /**
     * Returns the DI container
     *
     * @return \League\Container\Container
     */
    abstract protected function getContainer();
}
