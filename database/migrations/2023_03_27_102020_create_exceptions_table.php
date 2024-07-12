<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exceptions', function (Blueprint $table) {
            $table->increments('id');

            $table->uuid('correlation_id');

            $table->integer('status')
                ->comment('http status code');

            $table->string('message')
                ->nullable()
                ->comment('exception message');

            $table->string('file')
                ->nullable()
                ->comment('error file');

            $table->integer('line')
                ->nullable()
                ->comment('line number');

            $table->longText('trace')
                ->nullable()
                ->comment('stacktrace');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exceptions');
    }
}
