<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'image',
    //     'price',
    //     'admin_id',
    //     // 'admin_id' jika kamu pakai relasi
    // ];
        // 'admin_id' jika kamu pakai relasi
}
