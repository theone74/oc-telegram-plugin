<?php namespace TheOne74\Test1\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTheone74Telegram extends Migration
{
    public function up()
    {
        Schema::create('theone74_telegram_user_chat', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigInteger('user_id');
            $table->bigInteger('chat_id');

            $table->primary(['user_id', 'chat_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('theone74_telegram_user')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('chat_id')
                ->references('id')
                ->on('theone74_telegram_chat')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('theone74_telegram_user_chat');
    }

}
