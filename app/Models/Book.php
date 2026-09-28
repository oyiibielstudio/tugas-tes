<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'name',
        'author',
        'harga',
        'stock',
        'image',
        'description',
    ];

    // Relasi Inverse (Buku dimiliki oleh 1 Kategori)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => $image ? url('/storage/books/' . $image) : null,
        );
    }
}