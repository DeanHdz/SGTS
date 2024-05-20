<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Class Feedback extends Model
{
    protected $fillable = [
        'ticket_id',
        'user_id',
        'rating',
        'is_resolved',
        'content',
    ];


    //Definir la relación inversa con Ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    //Definir la relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Comprobar si esta resuelto el feedback
    public function isResolved()
    {
        return $this->is_resolved;
    }

    //Resolver feedback
    public function resolve()
    {
        $this->is_resolved = true;
        $this->save();
    }

    //Desresolver feedback
    public function unresolve()
    {
        $this->is_resolved = false;
        $this->save();
    }
}