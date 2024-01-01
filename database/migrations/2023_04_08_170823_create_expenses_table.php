<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MonthlyFinance;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->foreignIdFor(MonthlyFinance::class)->nullable();
            $table->unsignedBigInteger("horse_id")->nullable();
            $table->integer("amount");
            $table->string("category");
            $table->string("description");
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
        Schema::dropIfExists('expenses');
    }
};
