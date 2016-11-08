<?php
require_once('./LINEBotTiny.php');
$channelAccessToken = '4njqcB7ce+FZeLMAil5vte0VeoyvHGBkSO3HcM6bPOT7oDoDD/5jxD/aboxpOptqM7CeCantL2krpN3flrSJltb6hK5VT5MUlpaQ51SSc7y1pVNQI/JGYiCeYG0rK+uHWvnCil+WTJXhJw69CehD7AdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'd7a05537c9cc008dfe153c66dbbd0583';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
echo "index";
var_dump($client);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $message['text']
                            )
                        )
                    ));
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
