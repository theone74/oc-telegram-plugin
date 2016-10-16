<?php namespace TheOne74\Telegram\Updates;
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

class FixCallbackQuery extends Migration
{

    public function down()
    {
        Schema::table('theone74_telegram_callback_query', function($table)
        {
            $table->dropForeign('theone74_telegram_callback_query_chat_id_foreign');

            $table->dropIndex('chat_id');
            $table->dropIndex('message_id');

            $table->dropColumn('chat_id');
            $table->dropColumn('message_id');

            $table->text('message')->nullable()->default(null);
        });
    }

    public function up()
    {
        Schema::table('theone74_telegram_callback_query', function($table)
        {
            $table->bigInteger('chat_id')->nullable();
            $table->bigInteger('message_id')->unsigned()->nullable()->default(null);
            $table->dropColumn('message');
            // $table->text('message')->nullable()->default(null);

            $table->index(['chat_id'], 'chat_id');
            $table->index(['message_id'], 'message_id');

            $table->foreign('chat_id')
                ->references('id')
                ->on('theone74_telegram_chat');
        });
    }

}
