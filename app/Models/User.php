<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Piece; // 👈 à ajouter

class User extends Authenticatable
{
    use HasFactory, Notifiable;

   protected $fillable = [
    'name', 'email', 'password', 'role', 'points',
];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔌 Relation avec les pièces
    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }

    public function logs()
{
    return $this->hasMany(UserLog::class);
}

}


