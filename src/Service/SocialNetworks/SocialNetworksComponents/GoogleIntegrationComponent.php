<?php


namespace Service\SocialNetworks\SocialNetworksComponents;


class GoogleIntegrationComponent
{
    /**
     * Отправка послания в соцсеть Google
     * @param array $msg тело сообщения и все что с ним связано (документация с названиями полей прилагается)
     * @return bool статус отправки
     */
    public function msgSend(array $msg): bool
    {
        // ... берет и отправляет, а потом сообщает получилось или нет
    }

    /**
     * высылает циферку соответствующую сетевому статусу объекта соцсети Google
     * @param $url
     * @return int
     */
    public function onlineOrOffline($url): int
    {
        // ... любит отвечать цифрами, даже на непристойные вопросы
    }

}