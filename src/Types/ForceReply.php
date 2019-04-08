<?php


namespace TelegramBotsApi\Types;

/**
 * Upon receiving a message with instance of this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot‘s message and tapped ’Reply'). This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
 * @package TelegramBotsApi\Types
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class ForceReply implements TypeInterface
{
    /**
     * @var bool Shows reply interface to the user, as if they manually selected the bot‘s message and tapped ’Reply'
     */
    public $force_reply;

    /**
     * @var bool|null Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     */
    public $selective;

    /**
     * ForceReply constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->force_reply = $data['force_reply'];
        $this->selective = $data['selective'] ?? null;
    }

    /**
     * @return array
     */
    public function getRequestArray(): array
    {
        // TODO: Implement getRequestArray() method.
        return [
            'force_reply' => $this->force_reply,
            'selective' => $this->selective,
        ];
    }

    /**
     * @return ForceReply
     */
    public static function make(): self
    {
        return new self([
            'force_reply' => true,
        ]);
    }
}