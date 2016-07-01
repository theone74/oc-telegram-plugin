<?php namespace TheOne74\Test1\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTheone74TelegramTelegramUpdate extends Migration
{
    public function down()
    {
        Schema::drop('theone74_telegram_telegram_update');
    }

    public function up()
    {
        Schema::create('theone74_telegram_telegram_update', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('chat_id')->nullable()->default(null);
            $table->bigInteger('message_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('inline_query_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('chosen_inline_result_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('callback_query_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('edited_message_id')->unsigned()->nullable()->default(null);

            $table->index(['chat_id', 'message_id'], 'message_id');
            $table->index(['inline_query_id'], 'inline_query_id');
            $table->index(['chosen_inline_result_id'], 'chosen_inline_result_id');
            $table->index(['callback_query_id'], 'callback_query_id');
            $table->index(['edited_message_id'], 'edited_message_id');

            $table->foreign(['chat_id', 'message_id'])
                ->references(['chat_id', 'id'])
                ->on('theone74_telegram_message');

            $table->foreign('inline_query_id')
                ->references('id')
                ->on('theone74_telegram_inline_query');

            $table->foreign('chosen_inline_result_id', 'chosen_inline_result_id')
                ->references('id')
                ->on('theone74_telegram_chosen_inline_result');

            $table->foreign('callback_query_id')
                ->references('id')
                ->on('theone74_telegram_callback_query');

            $table->foreign('edited_message_id')
                ->references('id')
                ->on('theone74_telegram_edited_message');

        });
    }

}
