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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users','id')->onDelete('cascade'); //Llave foránea de la tabla users, se debe usar con el cliente
            $table->foreignId('support_id')->nullable()->constrained('users','id'); //Llave foránea de la tabla users, se debe usar con el agente de soporte
            $table->string('title'); //Título del ticket
            $table->text('description'); //Descripción del ticket
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
