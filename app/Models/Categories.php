<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    protected $primaryKey = 'id';
    protected $table = 'categories';

    // Relasi one-to-many ke Products
    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
