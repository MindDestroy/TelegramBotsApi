<?php


namespace TelegramBotsApi\Types;

/**
 * This object represents the content of a message to be sent as a result of an inline query. Telegram clients currently support the following 4 types:
 *    InputTextMessageContent
 *    InputLocationMessageContent
 *    InputVenueMessageContent
 *    InputContactMessageContent
 * @package TelegramBotsApi\Types
 * @author Maxim Kuvardin <kuvard.in@mail.ru>
 */
class InputMessageContent
{
    public const TYPE_TEXT = 'text';
    public const TYPE_LOCATION = 'location';
    public const TYPE_VENUE = 'venue';
    public const TYPE_CONTACT = 'contact';
}