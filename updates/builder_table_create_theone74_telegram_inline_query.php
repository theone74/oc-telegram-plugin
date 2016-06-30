<?php namespace TheOne74\Test1\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTheone74TelegramInlineQuery extends Migration
{
    public function up()
    {
        Schema::create('theone74_telegram_inline_query', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('location', 255)->nullable()->default(null);
            $table->text('query')->default('');
            $table->string('offset', 255)->nullable()->default(null);
            $table->timestamp('created_at')->nullable()->default(null);

            $table->index(['user_id'], 'user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('theone74_telegram_user');
        });
    }

    public function down()
    {
        Schema::drop('theone74_telegram_inline_query');
    }

}
