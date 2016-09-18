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

class BuilderTableCreateTheone74TelegramConversation extends Migration
{
    public function up()
    {
        Schema::create('theone74_telegram_conversation', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->nullable()->default(null);
            $table->bigInteger('chat_id')->nullable()->default(null);
            $table->enum('status', ['active', 'cancelled', 'stopped'])->default('active');
            $table->string('command', 160)->default('');
            $table->string('notes', 1000)->default('NULL');
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);

            $table->index(['user_id'], 'user_id');
            $table->index(['chat_id'], 'chat_id');
            $table->index(['status'], 'status');

            $table->foreign('user_id')
                ->references('id')
                ->on('theone74_telegram_user');

            $table->foreign('chat_id')
                ->references('id')
                ->on('theone74_telegram_chat');
        });
    }

    public function down()
    {
        Schema::drop('theone74_telegram_conversation');
    }

}
