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
        Schema::create('tefelagis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('supections')->nullable();
            $table->boolean('called')->default(0);
            $table->float('confidence')->default(0.0);
            $table->boolean('found')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tefelagis');
    }
};
