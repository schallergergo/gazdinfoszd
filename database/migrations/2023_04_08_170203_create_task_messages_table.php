<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("to_user_id")->nullable();
            $table->boolean("read")->default(0);
            $table->unsignedBigInteger("task_id");
            $table->string("message");
            $table->unsignedBigInteger("tenant_id");
            $table->softDeletes();
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
        Schema::dropIfExists('task_messages');
    }
};
