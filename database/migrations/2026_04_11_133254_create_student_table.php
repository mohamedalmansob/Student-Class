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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name',225);
            $table->string('phones',225);
            $table->string('address',225);
            $table->string('image',225);
            $table->string('nutionalID',30);
            $table->string('notes',225);
            $table->tinyInteger('active')->default(1)->comment('هل الطالب مفعل او معطل');
            $table->foreignId('country_id')->references('id')->on('countries')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
