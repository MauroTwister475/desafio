<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'user_id']; // Adicione 'user_id' se não estiver presente

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
