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
        Schema::create('authors',function(Blueprint $table){
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('avatar')->nullable() ;
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->text('story')->nullable();
            $table->boolean('active')->default(true); 
            $table->string('created_by'); 
            $table->string('updated_by')->nullable();
            $table->timestamps();
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
