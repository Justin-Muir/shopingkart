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
        Schema::create('list_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('listfor');
            $table->text('Item name');
            $table->decimal('price', 10,2);
            $table->decimal('quantity',10,2);
            $table->date('list date');
            $table->boolean('plus gct')->default(false);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
