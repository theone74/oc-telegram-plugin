<?php namespace TheOne74\Test1\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTheone74TelegramMessage extends Migration
{

    public function down()
    {
        Schema::drop('theone74_telegram_message');
    }

    public function up()
    {
        Schema::create('theone74_telegram_message', function($table)
        {
            $table->bigInteger('chat_id');
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('forward_from')->nullable()->default(null);
            $table->bigInteger('forward_from_chat')->nullable()->default(null);
            $table->bigInteger('reply_to_chat')->nullable()->default(null);
            $table->bigInteger('reply_to_message')->unsigned()->nullable()->default(null);
            $table->bigInteger('new_chat_member')->nullable()->default(null);
            $table->bigInteger('left_chat_member')->nullable()->default(null);
            $table->dateTime('date')->nullable()->default(null);
            $table->dateTime('forward_date')->nullable()->default(null);
            $table->text('text')->nullable()->default(null);
            $table->text('entities')->nullable()->default(null);
            $table->text('audio')->nullable()->default(null);
            $table->text('document')->nullable()->default(null);
            $table->text('photo')->nullable()->default(null);
            $table->text('sticker')->nullable()->default(null);
            $table->text('video')->nullable()->default(null);
            $table->text('voice')->nullable()->default(null);
            $table->text('contact')->nullable()->default(null);
            $table->text('location')->nullable()->default(null);
            $table->text('venue')->nullable()->default(null);
            $table->text('caption')->nullable()->default(null);
            $table->string('new_chat_title', 255)->nullable()->default(null);
            $table->text('new_chat_photo')->nullable()->default(null);
            $table->boolean('delete_chat_photo')->default(0);
            $table->boolean('group_chat_created')->default(0);
            $table->boolean('supergroup_chat_created')->default(0);
            $table->boolean('channel_chat_created')->default(0);
            $table->bigInteger('migrate_to_chat_id')->nullable()->default(null);
            $table->bigInteger('migrate_from_chat_id')->nullable()->default(null);
            $table->text('pinned_message')->nullable()->default(null);

            $table->primary(['chat_id', 'id']);
            $table->index(['user_id'], 'user_id');
            $table->index(['forward_from'], 'forward_from');
            $table->index(['forward_from_chat'], 'forward_from_chat');
            $table->index(['reply_to_chat'], 'reply_to_chat');
            $table->index(['reply_to_message'], 'reply_to_message');
            $table->index(['new_chat_member'], 'new_chat_member');
            $table->index(['left_chat_member'], 'left_chat_member');
            $table->index(['migrate_from_chat_id'], 'migrate_from_chat_id');
            $table->index(['migrate_to_chat_id'], 'migrate_to_chat_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('theone74_telegram_user');

            $table->foreign('chat_id')
                ->references('id')
                ->on('theone74_telegram_chat');

            $table->foreign('forward_from')
                ->references('id')
                ->on('theone74_telegram_user');

            $table->foreign('forward_from_chat')
                ->references('id')
                ->on('theone74_telegram_chat');

            $table->foreign(['reply_to_chat', 'reply_to_chat'])
                ->references(['chat_id', 'id'])
                ->on('theone74_telegram_message');

            $table->foreign('forward_from')
                ->references('id')
                ->on('theone74_telegram_user');

            $table->foreign('new_chat_member')
                ->references('id')
                ->on('theone74_telegram_user');

            $table->foreign('left_chat_member')
                ->references('id')
                ->on('theone74_telegram_user');
    }

}
