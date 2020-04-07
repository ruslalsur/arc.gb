<?php


namespace Service\SocialNetworks\SocialNetworksComponents;


class InstagramForDevelopers
{
    /**
     * Отправка данных в сеть Инстаграм
     *
     * В массиве должны быть передан ряд значений включая поля c ключами 'link' и 'text'
     * полный список полей, в соответствии с распоряжением губернатора города
     * Златоуст, мы высылаем почтой Роисси
     * @param array $data
     */
    public function message(array $data): void {
        // ... все выдумано, потому что никто ни разу не показывал как обстоит дело на самом деле
    }

    /**
     * Возвращает множество различных статусов в строковом формате от 'online' до 'полысел'
     *
     * @param string $link url в сети Инстаграм
     * @param bool $needNotify false если не требуется уведомить о запросе статуса объект в соцсети по почте Роисси
     * @return string
     */
    public function isConnected(string $link, bool $needNotify = true): string {
        //передать письмо с подтверждением ямщику почты Роисси вне зависимости от значения параметра $needNotify
        //с содержанием рекламы последней колекции утюгов и песен на ветру

        //return онлайн/нет
    }
}