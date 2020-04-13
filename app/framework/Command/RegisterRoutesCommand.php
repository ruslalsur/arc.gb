<?php


namespace Framework\Command;


use Framework\Command\Contract\CommandInterface;
use Kernel;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RegisterRoutesCommand implements CommandInterface
{
    /**
     * @var ContainerBuilder
     */
    private $kernel;

    /**
     * передача ядра по ссылки для модификации одного экземпляра
     * @param Kernel $kernel
     */
    public function __construct(Kernel &$kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * реализация командного интерфейса
     */
    public function run()
    {
        $this->kernel->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . '../../config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->kernel->containerBuilder->set('route_collection', $this->kernel->routeCollection);
    }
}