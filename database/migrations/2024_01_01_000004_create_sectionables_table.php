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
        Schema::create('sectionables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->string('sectionable_type');
            $table->unsignedBigInteger('sectionable_id');
            $table->integer('order')->default(0);
            $table->timestamps();
            
            $table->index(['sectionable_type', 'sectionable_id']);
            $table->index(['section_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sectionables');
    }
};
