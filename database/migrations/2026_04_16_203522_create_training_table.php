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
        Schema::create('training', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courseID')->references('id')->on('_corses')->onUpdate('cascade');
            $table->date('start_date')->comment('تاريخ بداية الدورة');
            $table->date('end')->comment('تاريخ نهاية الدورة');
            $table->decimal('prise',10,2)->nullable();
            $table->string('notes',400);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training');
    }
};
