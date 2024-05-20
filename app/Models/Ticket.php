<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Class Ticket extends Model
{
    protected $fillable = ['client_id', 'support_id', 'title', 'description'];

    // Definir la relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Determinar a que cliente pertenece el ticket
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    //Determinar a que agente de soporte pertenece el ticket
    public function support()
    {
        return $this->belongsTo(User::class, 'support_id');
    }

    //Relación uno a muchos, retornar mensajes asociados al ticket
    public function messages()
    {
        return $this->hasMany(Message::class, 'ticket_id');
    }

    //Relación uno a uno, retornar feedback asociado al ticket
    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'ticket_id');
    }
}