<?php

namespace TelegramBotsApi\Types\InlineQueryResult;

use \TelegramBotsApi;

/**
 * Represents a link to an mp3 audio file. By default, this audio file will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 * @package TelegramBotsApi\Types\InlineQueryResult
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class Audio extends TelegramBotsApi\Types\InlineQueryResult implements TelegramBotsApi\Types\TypeInterface
{
    public const TYPE = TelegramBotsApi\Types\InlineQueryResult::TYPE_AUDIO;

    /**
     * @var string Type of the result, must be self::TYPE
     */
    public $type;

    /**
     * @var string Unique identifier for this result, 1-64 bytes
     */
    public $id;

    /**
     * @var string A valid URL for the audio file
     */
    public $audio_url;

    /**
     * @var string Title
     */
    public $title;

    /**
     * @var string|null Caption, 0-1024 characters
     */
    public $caption;

    /**
     * @var string|null Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     */
    public $parse_mode;

    /**
     * @var string|null Performer
     */
    public $performer;

    /**
     * @var int|null Audio duration in seconds
     */
    public $audio_duration;

    /**
     * @var TelegramBotsApi\Types\InlineKeyboardMarkup|null Inline keyboard attached to the message
     */
    public $reply_markup;

    /**
     * @var TelegramBotsApi\Types\InputMessageContent|null Content of the message to be sent instead of the audio
     */
    public $input_message_content;

    /**
     * Audio constructor.
     * @param array $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        if (isset($data['type'])) {
            if ($data['type'] !== self::TYPE) {
                throw new \Exception("Unknown type: {$data['type']}. Type must be self::TYPE.");
            }
            $this->type = $data['type'];
        }

        $this->id = $data['id'];
        $this->audio_url = $data['audio_url'];
        $this->title = $data['title'];
        $this->caption = $data['caption'] ?? null;

        if (isset($data['parse_mode'])) {
            if (!TelegramBotsApi\Bot::checkParseMode($data['parse_mode'])) {
                throw new \Exception("Unknown parse mode: {$data['parse_mode']}");
            }
            $this->parse_mode = $data['parse_mode'];
        }

        $this->performer = $data['performer'] ?? null;
        $this->audio_duration = $data['audio_duration'] ?? null;

        if (isset($data['reply_markup'])) {
            $this->reply_markup = $data['reply_markup'] instanceof TelegramBotsApi\Types\InlineKeyboardMarkup ? $data['reply_markup'] : new TelegramBotsApi\Types\InlineKeyboardMarkup($data['reply_markup']);
        }

        if (isset($data['input_message_content'])) {
            $this->input_message_content = $data['input_message_content'] instanceof TelegramBotsApi\Types\InputMessageContent ? $data['input_message_content'] : new TelegramBotsApi\Types\InputMessageContent();
        }
    }

    /**
     * @return array
     */
    public function getRequestArray(): array
    {
        return [
            'type' => $this->type,
            'id' => $this->id,
            'audio_url' => $this->audio_url,
            'title' => $this->title,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode,
            'performer' => $this->performer,
            'audio_duration' => $this->audio_duration,
            'reply_markup' => $this->reply_markup,
            'input_message_content' => $this->input_message_content,
        ];
    }

    /**
     * @param string $id
     * @param string $audio_url
     * @param string $title
     * @return Audio
     * @throws \Exception
     */
    public static function make(string $id, string $audio_url, string $title): self
    {
        return new self([
            'id' => $id,
            'audio_url' => $audio_url,
            'title' => $title,
        ]);
    }
}