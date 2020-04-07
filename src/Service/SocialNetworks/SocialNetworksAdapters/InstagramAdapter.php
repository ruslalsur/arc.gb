<?php


namespace Service\SocialNetworks\SocialNetworksAdapters;


use Service\SocialNetworks\SocialNetworkInterface;
use Service\SocialNetworks\SocialNetworksComponents\InstagramForDevelopers;

class InstagramAdapter implements SocialNetworkInterface
{
    private InstagramForDevelopers $instagram;

    /**
     * InstagramAdapter constructor.
     * @param $instagram
     */
    public function __construct(InstagramForDevelopers $instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @inheritDoc
     */
    public function send(string $url, string $message): void
    {
        $message = [];
        $message[] = [
            'link' => $url,
            'text' => $message,
            'сегодня' => date('d.m.YY'),
            'адавайте' => 'нет',
            'аможет' => 'не надо',
            'нутогда' => 'спасибо',
            'хотябы' => 'потом',
            'точно' => true
        ];

        $this->instagram->message($message);
    }

    /**
     * @inheritDoc
     */
    public function getOnlineStatus(string $url): bool
    {
        $result = $this->instagram->isConnected($url, false);

        if ($result != 'offline') {
            return true;
        }

        return false;
    }
}