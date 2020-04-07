<?php


namespace Service\SocialNetworks\SocialNetworksAdapters;


use Service\SocialNetworks\SocialNetworkInterface;
use Service\SocialNetworks\SocialNetworksComponents\GoogleIntegrationComponent;

class GoogleAdapter implements SocialNetworkInterface
{
    private GoogleIntegrationComponent $google;

    /**
     * GoogleAdapter constructor.
     * @param GoogleIntegrationComponent $google
     */
    public function __construct(GoogleIntegrationComponent $google)
    {
        $this->google = $google;
    }

    /**
     * @inheritDoc
     */
    public function send(string $url, string $message): void
    {
        $msg = [$url, $message, date('YY-mm-dd'), 'абрикосы'];

        if (!$this->google->msgSend($msg)) {
            for ($i = 0; $i < 100; $i++) {
                $this->google->msgSend($msg);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function getOnlineStatus(string $url): bool
    {
        //цифра 5 - в прилагаемой документации означает 'offline'
        if ($this->google->onlineOrOffline($url) != 5) {
            return true;
        }

        return false;
    }
}