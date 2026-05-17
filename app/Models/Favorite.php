<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    // Дозволяємо масове заповнення цих полів
    protected $fillable = ['user_id', 'currency_code'];

    // Зворотний зв'язок: кожне "обране" належить юзеру
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}