<?php


namespace Framework;


use Framework\Command\Contract\CommandInterface;

class KernelCommandInvoker
{
    /**
     * @var CommandInterface[]
     */
    private array $commands;

    /**
     * постановка новой команды в очередь
     * @param CommandInterface $command
     * @return int
     */
    public function addCommand(CommandInterface $command): int
    {
        $this->commands[] = $command;
        return count($this->commands);
    }

    /**
     * выполнение очереди комманд
     */
    public function run(): void
    {
        foreach ($this->commands as $command) {
            $command->run();
        }
    }
}