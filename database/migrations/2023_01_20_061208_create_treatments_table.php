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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tenant_id");
            $table->foreignId("horse_id");
            $table->date("date_of_treatment");
            $table->enum("type_of_treatment",['farrier','vet','vaccination','deworming','breeding']);
            $table->integer("cost_of_treatment");
            $table->date("date_of_notification");
            $table->foreignId("last_updated_by");
            $table->string("comments")->nullable();
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
        Schema::dropIfExists('treatments');
    }
};
