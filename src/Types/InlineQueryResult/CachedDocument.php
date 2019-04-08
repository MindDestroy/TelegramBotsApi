<?php

namespace TelegramBotsApi\Types\InlineQueryResult;

use \TelegramBotsApi;

/**
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file.
 * @package TelegramBotsApi\Types\InlineQueryResult
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class CachedDocument extends TelegramBotsApi\Types\InlineQueryResult implements TelegramBotsApi\Types\TypeInterface
{
    public const TYPE = TelegramBotsApi\Types\InlineQueryResult::TYPE_DOCUMENT;

    /**
     * @var string Type of the result, must be self::TYPE
     */
    public $type = self::TYPE;

    /**
     * @var string Unique identifier for this result, 1-64 bytes
     */
    public $id;

    /**
     * @var string Title for the result
     */
    public $title;

    /**
     * @var string A valid file identifier for the file
     */
    public $document_file_id;

    /**
     * @var string|null Short description of the result
     */
    public $description;

    /**
     * @var string|null Caption of the document to be sent, 0-1024 characters
     */
    public $caption;

    /**
     * @var string|null Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     */
    public $parse_mode;

    /**
     * @var TelegramBotsApi\Types\InlineKeyboardMarkup|null Inline keyboard attached to the message
     */
    public $reply_markup;

    /**
     * @var TelegramBotsApi\Types\InputMessageContent|null Content of the message to be sent instead of the file
     */
    public $input_message_content;

    public function __construct(array $data)
    {
        if (isset($data['type'])) {
            if ($data['type'] !== self::TYPE) {
                throw new \Exception("Unknown type: {$data['type']}. Type must be self::TYPE.");
            }
            $this->type = $data['type'];
        }

        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->document_file_id = $data['document_file_id'];
        $this->description = $data['description'] ?? null;
        $this->caption = $data['caption'] ?? null;

        if (isset($data['parse_mode'])) {
            if (!TelegramBotsApi\Bot::checkParseMode($data['parse_mode'])) {
                throw new \Exception("Unknown parse mode: {$data['parse_mode']}");
            }
            $this->parse_mode = $data['parse_mode'];
        }

        if (isset($data['reply_markup'])) {
            $this->reply_markup = $data['reply_markup'] instanceof TelegramBotsApi\Types\InlineKeyboardMarkup ? $data['reply_markup'] : new TelegramBotsApi\Types\InlineKeyboardMarkup($data['reply_markup']);
        }

        if (isset($data['input_message_content'])) {
            $this->input_message_content = $data['input_message_content'] instanceof TelegramBotsApi\Types\InputMessageContent ? $data['input_message_content'] : new TelegramBotsApi\Types\InputMessageContent($data['input_message_content']);
        }
    }

    public function getRequestArray(): array
    {
        return [
            'type' => $this->type,
            'id' => $this->id,
            'title' => $this->title,
            'document_file_id' => $this->document_file_id,
            'description' => $this->description,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode,
            'reply_markup' => $this->reply_markup,
            'input_message_content' => $this->input_message_content,
        ];
    }

    public static function make(string $id, string $title, string $document_file_id): self
    {
        return new self([
            'id' => $id,
            'title' => $title,
            'document_file_id' => $document_file_id,
        ]);
    }
}