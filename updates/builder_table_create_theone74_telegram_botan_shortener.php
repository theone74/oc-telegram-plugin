<?php namespace TheOne74\Test1\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTheone74TelegramBotanShortener extends Migration
{
    public function down()
    {
        Schema::drop('theone74_telegram_botan_shortener');
    }

    public function up()
    {
        Schema::create('theone74_telegram_botan_shortener', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->nullable()->default(null);
            $table->text('url')->default('');
            $table->string('short_url', 255)->default('');
            $table->timestamp('created_at')->nullable()->default(null);

            $table->foreign('user_id')
                ->references('id')
                ->on('theone74_telegram_user');
        });
    }

}
