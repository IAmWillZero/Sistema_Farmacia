<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'amount',
        // Añade aquí los campos que deseas que sean fillable
    ];

    // Otras relaciones o métodos del modelo, por ejemplo:
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }
}
