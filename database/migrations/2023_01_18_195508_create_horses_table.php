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
        Schema::create('horses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("birthdate")->nullable();
            $table->string("gender")->nullable();
            $table->string("passport_number")->nullable();
            $table->string("FEI_number")->nullable();
            $table->boolean("active")->default(1);
            $table->string("color")->nullable();
            $table->string("comments")->nullable();
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
        Schema::dropIfExists('horses');
    }
};
