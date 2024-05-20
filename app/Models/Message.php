<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Class Message extends Model
{
    protected $fillable = ['ticket_id', 'user_id', 'content'];

    //Determinar a que ticket pertenece el mensaje
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    //Determinar a que usuario pertenece el mensaje
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


