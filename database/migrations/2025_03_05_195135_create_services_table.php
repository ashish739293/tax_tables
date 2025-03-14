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
        Schema::table('services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->json('features')->nullable(); // Store array as JSON
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
        Schema::table('services', function (Blueprint $table) {
            $table->text('description')->nullable(); // Add back the column if rollback is needed
        });
    }
};
