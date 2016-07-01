<?php namespace TheOne74\Test1\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTheone74TelegramChat extends Migration
{
    public function up()
    {
        Schema::create('theone74_telegram_chat', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigInteger('id');
            $table->enum('type', ['private', 'group', 'supergroup', 'channel']);
            $table->string('title', 255)->nullable()->default('');
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);
            $table->string('old_id', 255)->nullable()->default(null);

            $table->primary('id');
            $table->index(['old_id'], 'old_id');
        });
    }

    public function down()
    {
        Schema::drop('theone74_telegram_chat');
    }

}
