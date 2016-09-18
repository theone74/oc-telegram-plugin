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

class BuilderTableCreateTheone74TelegramCallbackQuery extends Migration
{

    public function down()
    {
        Schema::drop('theone74_telegram_callback_query');
    }

    public function up()
    {
        Schema::create('theone74_telegram_callback_query', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->nullable();
            $table->text('message')->nullable()->default(null);
            $table->string('inline_message_id', 255)->nullable()->default(null);
            $table->string('data', 255)->default('');
            $table->timestamp('created_at')->nullable()->default(null);

            $table->index(['user_id'], 'user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('theone74_telegram_user');
        });
    }

}
