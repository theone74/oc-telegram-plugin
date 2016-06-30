<?php namespace TheOne74\Test1\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTheone74TelegramUser extends Migration
{
    public function up()
    {
        Schema::create('theone74_telegram_user', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigInteger('id');
            $table->string('first_name', 255)->default('');
            $table->string('last_name', 255)->nullable()->default(null);
            $table->string('username', 255)->nullable()->default(null);
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);

            $table->primary('id');
            $table->index(['username'], 'username');
        });
    }

    public function down()
    {
        Schema::drop('theone74_telegram_user');
    }

}
