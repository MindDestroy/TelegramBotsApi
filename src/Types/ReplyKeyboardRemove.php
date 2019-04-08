<?php

namespace TelegramBotsApi\Types;

/**
 * Upon receiving a message with onstance of this object, Telegram clients will remove the current custom keyboard and display the default letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is made for one-time keyboards that are hidden immediately after the user presses a button (see ReplyKeyboardMarkup).
 * @package TelegramBotsApi\Types
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class ReplyKeyboardRemove implements TypeInterface
{
    /**
     * @var bool Requests clients to remove the custom keyboard (user will not be able to summon this keyboard; if you want to hide the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
     */
    public $remove_keyboard;

    /**
     * @var bool|null Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     */
    public $selective;

    /**
     * ReplyKeyboardRemove constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->remove_keyboard = $data['remove_keyboard'];
        $this->selective = $data['selective'] ?? null;
    }

    /**
     * @return array
     */
    public function getRequestArray(): array
    {
        // TODO: Implement getRequestArray() method.
        return [
            'remove_keyboard' => $this->remove_keyboard,
            'selective' => $this->selective,
        ];
    }

    /**
     * @param bool $remove_keyboard
     * @return ReplyKeyboardRemove
     */
    public static function make(bool $remove_keyboard): self
    {
        return new self([
            'remove_keyboard' => $remove_keyboard,
        ]);
    }
}