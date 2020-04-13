<?php

use Framework\Command\RegisterConfigCommand;
use Framework\Command\RegisterRoutesCommand;
use Framework\KernelCommandInvoker;
use Framework\Registry;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
    'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$request = Request::createFromGlobals();
$containerBuilder = new ContainerBuilder();
Registry::addContainer($containerBuilder);

// создание экземпляра получателя
$kernel = new Kernel($containerBuilder);

// создание экземпляра класса менеджера очереди команд
$kernelCommander = new KernelCommandInvoker();

// формирование очереди команд
$kernelCommander->addCommand(new RegisterConfigCommand($kernel));
$kernelCommander->addCommand(new RegisterRoutesCommand($kernel));

// запуск команд из очереди
$kernelCommander->run();

$response = $kernel->process($request);
$response->send();
