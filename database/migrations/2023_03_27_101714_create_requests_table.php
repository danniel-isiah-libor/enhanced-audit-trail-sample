<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');

            $table->uuid('correlation_id');

            $table->string('service')
                ->comment('name of service');

            $table->uuid('merchant_uuid')
                ->nullable()
                ->comment('uuid of merchant');

            $table->uuid('user_uuid')
                ->nullable()
                ->comment('uuid of user');

            $table->string('user_type')
                ->nullable()
                ->comment('type of user');

            $table->double('response_time')
                ->comment('seconds');

            $table->double('memory_usage')
                ->comment('bytes');

            $table->double('memory_peak_usage')
                ->comment('bytes');

            $table->string('ip')
                ->comment('ip address');

            $table->string('host');

            $table->string('path');

            $table->integer('status')
                ->comment('http status code');

            $table->string('method')
                ->comment('http request method');

            $table->json('headers')
                ->comment('http request headers');

            $table->json('payload')
                ->nullable()
                ->comment('http request payload');

            $table->json('response')
                ->nullable()
                ->comment('http response body');

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
        Schema::dropIfExists('requests');
    }
}
