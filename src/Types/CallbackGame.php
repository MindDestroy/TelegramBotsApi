<?php


namespace TelegramBotsApi\Types;

/**
 * A placeholder, currently holds no information. Use BotFather to set up your game.
 * @package TelegramBotsApi\Types
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class CallbackGame implements TypeInterface
{
    /**
     * CallbackGame constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {

    }

    /**
     * @return array
     */
    public function getRequestArray(): array
    {
        // TODO: Implement getRequestArray() method.
        return [

        ];
    }

    /**
     * @return CallbackGame
     */
    public static function make(): self
    {
        return new self([

        ]);
    }
}