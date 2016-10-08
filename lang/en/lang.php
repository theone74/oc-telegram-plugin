<?php return [
    'plugin' => [
        'name' => 'Telegram',
        'description' => ''
    ],
    'left_menu' => [
        'users' =>'Users',
        'messages' => 'Messages',
        'chats' => 'Chats'
    ],
    'lists' => [
        'id' => 'ID',
        'type' => 'Type',
        'title' => 'Group title',
        'username' => 'Username',
        'control' => '',
        'name' => 'Name',
        'chat' => 'Chat',
        'text' => 'Text',
        'date' => 'Date',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',

    ],
    'chats' => [
        'send_message' => 'Send message',
    ],
    'send_msg_wnd' => [
        'caption' => 'Send message',
        'placeholder' => 'Enter message text...',
        'ok' => 'Send',
        'cancel' => 'Cancel',
        'confirm' => 'Are you sure?',
    ],
    'users' => [

    ],
    'settings' => [
        'page_name' => 'Bot settings',
        'page_desc' => 'Manage bot settings',
        'bot_token' => 'Bot token',
        'bot_name' => 'Bot name',
        'cert_path' => 'Certificate file path (*.crt)',
        'use_webhook' => 'Use webhook?',
        'is_selfsigned' => 'Self signed certificate?',
        'bot_tab' => 'Bot config',
        'admin_tab' => 'Admins',
        'admins_ids' => 'Admins',
        'user_id' => 'Admin',
        'add_new_admin' => 'Add new admin',
        'db_encoding' => 'Db encoding',
        'db_encoding_utf8' => 'utf8 (Default)',
        'db_encoding_utf8mb4' => 'utf8mb4',
        'botan_token' => 'Botan.io token',
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
        'cert_path_required' => '"Certificate file path" field is required.'
    ],
];
