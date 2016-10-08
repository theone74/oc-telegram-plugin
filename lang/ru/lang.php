<?php return [
    'plugin' => [
        'name' => 'Телеграф',
        'description' => ''
    ],
    'left_menu' => [
        'users' =>'Пользователи',
        'messages' => 'Сообщения',
        'chats' => 'Чаты'
    ],
    'lists' => [
        'id' => '#',
        'type' => 'Тип',
        'title' => 'Заголовок',
        'username' => 'Пользователь',
        'control' => '',
        'name' => 'Имя',
        'chat' => 'Чат',
        'text' => 'Текст',
        'date' => 'Дата',
        'created_at' => 'Создан',
        'updated_at' => 'Обновлен',
    ],
    'chats' => [
        'send_message' => 'Написать сообщение',
    ],
    'send_msg_wnd' => [
        'caption' => 'Написать сообщение',
        'placeholder' => 'Введите текст...',
        'ok' => 'Отправить',
        'cancel' => 'Отмена',
        'confirm' => 'Вы уверены?',
    ],
    'users' => [

    ],
    'settings' => [
        'page_name' => 'Настройки бота',
        'page_desc' => 'Настройки бота',
        'bot_token' => 'Токен',
        'bot_name' => 'Имя бота',
        'cert_path' => 'Путь к файлу сертификата (*.crt)',
        'use_webhook' => 'Использовать webhook',
        'is_selfsigned' => 'Самоподписанный сертификат?',
        'bot_tab' => 'Настройки бота',
        'admin_tab' => 'Администраторы бота',
        'admins_ids' => 'Администраторы',
        'user_id' => 'Админ',
        'add_new_admin' => 'Добавить нового администратора',
        'db_encoding' => 'Кодировка базы данных',
        'db_encoding_utf8' => 'utf8 (Default)',
        'db_encoding_utf8mb4' => 'utf8mb4',
        'botan_token' => 'Botan.io токен',
        'botan_tab' => 'Botan.io',
        'botan_placeholder' => 'GAX8YDgkVzXJrFmTbf1vXU34bD_rZUB7',
        'btn_test_web_hook' => 'Test webhook',
        'lbl_test_web_hook' => 'Test webhook',

        'wnd' => [
            'title' => 'Webhook info',
            'url' => 'url',
            'has_custom_certificate' => 'Has custom certificate',
            'pending_update_count' => 'Pending update count',
            'last_error_date' => 'Last error date',
            'last_error_message' => 'Last error message',
            'ok' => 'ok',
        ]
    ],
	'error' => [
		'cert_path_required' => 'Необходимо заполнить "Certificate file path".'
	],
];
