<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            
            $table->id();
            // relasi table : 
            $table->foreignId('category_id')->constrained('categories')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('item_name');
            $table->text('desc');
            $table->string('slug')->unique();
            $table->string('image');
            $table->integer('stok');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
