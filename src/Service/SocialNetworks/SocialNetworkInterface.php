<?php


namespace Service\SocialNetworks;


interface SocialNetworkInterface
{
    /**
     * Отправка сообщение в определенное место соцсети
     * @param string $url в какое такое место соцсети послать сообщение
     * @param string $message сообщение
     */
    public function send(string $url, string $message): void;

    /**
     * Выяснение статуса определенного объекта соцсети
     * @param string $url объекта в соцсети состоянием которого будем интересоваться
     * @return bool состояние подключения объекта
     */
    public function getOnlineStatus(string $url): bool;
}