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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets','id')->onDelete('cascade'); //Llave foránea de la tabla tickets
            $table->foreignId('user_id')->constrained('users','id'); //Llave foránea de la tabla users, puede ser agente de soporte o cliente
            $table->text('content'); //Contenido del mensaje
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
