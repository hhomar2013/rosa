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
        Schema::create('pos_registers', function (Blueprint $table) {
            $table->id();
            $table->double("startMoney",10,2)->default(0);
            $table->double("endMoney",10,2)->default(0);
            $table->foreignId('user_id')->constrained('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->string('statues')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_registers');
    }
};
