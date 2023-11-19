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
        Schema::create('easycrud_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('label',200)->nullable();
            $table->string('model',200);
            $table->text('styles',1000)->nullable();
            $table->string('url',200);
            $table->text('classes',1000);
            $table->longText('code',100000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('easycrud_forms');
    }
};
