<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gas_distribute', function (Blueprint $table) {
            $table->id();
            $table->string('disId');
            $table->integer('qty');
            $table->string('techId');
            $table->string('status')->default('Pending');
            $table->string('gasId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribute_history');
    }
};
