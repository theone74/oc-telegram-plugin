<?php namespace TheOne74\Test1\Updates;
/**
 * This file is part of the Telegram plugin for OctoberCMS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Anton Romanov <iam+octobercms@theone74.ru>
 */
 
use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTheone74TelegramEditedMessage extends Migration
{

    public function down()
    {
        Schema::drop('theone74_telegram_edited_message');
    }

    public function up()
    {
        Schema::create('theone74_telegram_edited_message', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('chat_id');
            $table->bigInteger('message_id')->unsigned();
            $table->bigInteger('user_id')->nullable();
            $table->dateTime('edit_date')->nullable()->default(null);
            $table->text('text')->nullable()->default(null);
            $table->text('entities')->nullable()->default(null);
            $table->text('caption')->nullable()->default(null);

            $table->index(['chat_id'], 'chat_id');
            $table->index(['message_id'], 'message_id');
            $table->index(['user_id'], 'user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('theone74_telegram_user');

            $table->foreign('chat_id')
                ->references('id')
                ->on('theone74_telegram_chat');

            $table->foreign(['chat_id', 'message_id'])
                ->references(['chat_id', 'id'])
                ->on('theone74_telegram_message');
        });
    }

}
