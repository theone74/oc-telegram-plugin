This plugin allows you to integrate functions of Telegram bots to your website and send data to users, groups or channels.

Big thanks to 
* Longman https://github.com/akalongman/php-telegram-bot
* Yurasov Max (aka Diz)


Applications:
* Make important notifications about site events to your Telegram application (desktop and mobile devices)
* Receive messages and command from users and answer them
* Send messages to groups, chat rooms, channels (like news or some kind of information or statistic)
* Show keyboard, built-in keyboard  
* All list in the [official doc](https://core.telegram.org/bots#1-what-can-i-do-with-bots)


### Create bot

Follow this [steps](https://core.telegram.org/bots#6-botfather) to create bot and receive token.

### Configure plugin

* (required) Set Telegram token
* (required) Set bot name
* (required) Set webhook checkbox, it enables receive message from Telegram.
* (optional) Db encoding. Select your db encoding.
* (optional) Set certificate path if you use self-signed ssl certificate.
* (optional) Select admin users. (example)
* (optional) [Botan.io analitycs](http://botan.io)

### Simple notifications

Use plugin to send notification over telegram. To do that:

* Configure telegram bot account in the backend panel, go to Settings -> Telegram -> Bot settings
* Add at the top of your controller or page code `use \TheOne74\Telegram\Classes\TelegramApi;`
* Get your `chat_id` from Telegram -> Chats
* Send message with 
```
TelegramApi::instance()->sendMessage(['chat_id'=>chat_id, 'text'=>'new order was submitted']);
```

### Create bot behaviour

To be coninued
