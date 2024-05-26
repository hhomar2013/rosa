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
        Schema::create('pos_register_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pr_id')->constrained('pos_registers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pm_id')->constrained('payment_methods')->onUpdate('cascade')->onDelete('cascade');
            $table->string('details')->nullable();
            $table->double("total",10,2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_register_details');
    }
};
