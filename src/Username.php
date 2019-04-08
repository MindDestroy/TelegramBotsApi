<?php


namespace TelegramBotsApi;

/**
 * Class Username
 * @package TelegramBotsApi
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class Username
{
    public const URL_FORMAT = 'https://t.me/%s';

    /**
     * @var string
     */
    private $username;

    /**
     * Username constructor.
     * @param $username
     */
    public function __construct($username)
    {
        $this->username = ltrim($username, '@');
    }

    /**
     * @return string
     */
    public function getShort(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getFull(): string
    {
        return '@' . $this->username;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return sprintf(self::URL_FORMAT, $this->username);
    }
}