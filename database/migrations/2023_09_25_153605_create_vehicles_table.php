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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('name');
            $table->decimal('price',10,2);
            $table->text('image');
            $table->string('brand');
            $table->string('type')->default('Car');
            $table->longText('description');
            $table->string('year');
            $table->integer('mileage');
            $table->string('fuel');
            $table->string('condition')->default('Used');
            $table->string('characteristics')->nullable();
            $table->timestamps();
            $table->foreignId('users_id')->nullable()->constrained('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
