<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Comprobar el rol de usuario dependiendo del string de entrada (admin, soporte, cliente)
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    //Relación uno a muchos, retornar tickets asociados al usuario (cliente y soporte)
    public function tickets_support()
    {
        return $this->hasMany(Ticket::class, 'support_id');
    }

    public function tickets_client()
    {
        return $this->hasMany(Ticket::class, 'client_id');
    }

    //Relación uno a muchos, retornar mensajes asociados al usuario (cliente y soporte)
    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    /*********************************** DESTINADO PARA ESTADISTICAS *****************************************/

    // ESTADISTICAS GENERALES

    //Retornar el conteo total de tickets asociados al usuario
    public function ticketsCount()
    {
        return $this->tickets()->count();
    }

    //Retornar el conteo total de tickets sin feedback
    public function ticketsCountWithoutFeedback()
    {
        return $this->tickets()->whereDoesntHave('feedback')->count();
    }

    //Retornar el conteo total de tickets con feedback
    public function ticketsCountWithFeedback()
    {
        return $this->tickets()->whereHas('feedback')->count();
    }

            ////////////// ESTADISTICAS DE ACUERDO A UN AGENTE DE SOPORTE EN ESPECIFICO /////////////

    //Relación uno a muchos, retornar feedbacks asociados a un agente de soporte
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'support_id');
    }

    //Retornar conteo de feedbacks asociados al usuario
    public function feedbacked()
    {
        return $this->feedbacks()->count();
    }

    //Retornar conteo de feedbacks resueltos asociados al usuario
    public function feedbackedResolved()
    {
        return $this->feedbacks()->where('is_resolved', true)->count();
    }

    //Retornar conteo de feedbacks no resueltos asociados al usuario
    public function feedbackedUnresolved()
    {
        return $this->feedbacks()->where('is_resolved', false)->count();
    }

    //Retornar promedio de calificación de feedbacks asociados al usuario
    public function feedbackedRating()
    {
        return $this->feedbacks()->avg('rating');
    }

    //Retornar promedio de calificación de feedbacks resueltos asociados al usuario
    public function feedbackedRatingResolved()
    {
        return $this->feedbacks()->where('is_resolved', true)->avg('rating');
    }

    //Retornar promedio de calificación de feedbacks no resueltos asociados al usuario
    public function feedbackedRatingUnresolved()
    {
        return $this->feedbacks()->where('is_resolved', false)->avg('rating');
    }

    //Retornar conteo de calificaciones asociadas al usuario
    public function feedbackedRatingCount()
    {
        return $this->feedbacks()->count();
    }

    //Retornar conteo de calificaciones resueltas asociadas al usuario
    public function feedbackedRatingCountResolved()
    {
        return $this->feedbacks()->where('is_resolved', true)->count();
    }

    //Retornar conteo de calificaciones no resueltas asociadas al usuario
    public function feedbackedRatingCountUnresolved()
    {
        return $this->feedbacks()->where('is_resolved', false)->count();
    }
}
