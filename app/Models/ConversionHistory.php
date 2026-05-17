<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversionHistory extends Model
{
    use HasFactory;

    // Вказуємо точну назву таблиці в базі, якщо вона відрізняється
    protected $table = 'conversion_histories';

    // Дозволяємо Laravel автоматично записувати ці поля з масиву request
    protected $fillable = [
        'user_id',
        'from_currency',
        'to_currency',
        'amount',
        'result',
        'rate'
    ];

    // Зв'язок з користувачем (опціонально, але корисно)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}