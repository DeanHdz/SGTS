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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets','id')->onDelete('cascade'); //Llave foránea de la tabla tickets
            $table->foreignId('support_id')->constrained('users','id'); //Llave foránea de la tabla users, se debe usar con el agente de soporte
            $table->integer('rating'); //Calificación de 1 al 10
            $table->boolean('is_resolved'); //Indica si el problema fue resuelto
            $table->text('content')->nullable(); //Comentario del cliente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
