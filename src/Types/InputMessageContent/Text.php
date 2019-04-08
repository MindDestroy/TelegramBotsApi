<?php

namespace TelegramBotsApi\Types\InputMessageContent;

use \TelegramBotsApi;

class Text extends TelegramBotsApi\Types\InputMessageContent implements TelegramBotsApi\Types\TypeInterface
{
    public const TYPE = TelegramBotsApi\Types\InputMessageContent::TYPE_TEXT;
    
    /**
     * @var string Text of the message to be sent, 1-4096 characters
     */
    public $message_text;

    /**
     * @var string|null Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     */
    public $parse_mode;

    /**
     * @var bool|null Disables link previews for links in the sent message
     */
    public $disable_web_page_preview;

    /**
     * Text constructor.
     * @param array $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        $this->message_text = $data['message_text'];

        if (isset($data['parse_mode'])) {
            if (!TelegramBotsApi\Bot::checkParseMode($data['parse_mode'])) {
                throw new \Exception("Unknown parse mode: {$data['parse_mode']}");
            }
            $this->parse_mode = $data['parse_mode'];
        }

        $this->disable_web_page_preview = $data['disable_web_page_preview'] ?? null;
    }

    /**
     * @return array
     */
    public function getRequestArray(): array
    {
        // TODO: Implement getRequestArray() method.
        return [
            'message_text' => $this->message_text,
            'parse_mode' => $this->parse_mode,
            'disable_web_page_preview' => $this->disable_web_page_preview,
        ];
    }

    /**
     * @param string $message_text
     * @return Text
     * @throws \Exception
     */
    public static function make(string $message_text): self
    {
        return new self([
            'message_text' => $message_text,
        ]);
    }
}