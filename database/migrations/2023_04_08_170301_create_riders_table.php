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
        Schema::create('riders', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->integer("normal_price");
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("tenant_id");
            $table->boolean("active")->default(1);
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
        Schema::dropIfExists('riders');
    }
};
