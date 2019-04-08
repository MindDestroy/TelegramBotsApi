# TelegramBots

Simply PHP classes for make Telegram-bots.

## Using Examples
### Init bot
```
<?php
$bot_token = '123456:AAAAAAAAAAAAAAA';
$bot_username = 'ExampleBot';
$bot = new TelegramBots\Api\Bot($bot_token, $bot_username);
```

### Sending message
```
<?php
$chat_id = 123456789;
$message_text = 'Hi!';
$request = $bot->sendMessage($chat_id, $message_text);
try {
    $response = $request->sendRequest();
    echo 'Successful sended';
} catch (TelegramBots\Api\Exceptions\ApiException $e) {
    echo "Telegram API returns error: $e";
} catch (TelegramBots\Api\Exceptions\CurlException $e) {
    echo "Request sending error: $e";
}
```