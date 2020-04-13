<?php


namespace Framework\Command;


use Framework\Command\Contract\CommandInterface;

use Kernel;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class RegisterConfigCommand implements CommandInterface
{
    private Kernel $kernel;

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
        try {
            $fileLocator = new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . '../../config');
            $loader = new PhpFileLoader($this->kernel->containerBuilder, $fileLocator);
            $loader->load('parameters.php');
        } catch (\Throwable $e) {
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }
    }
}