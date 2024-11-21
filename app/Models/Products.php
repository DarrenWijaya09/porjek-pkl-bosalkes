<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\OrderItems;
use App\Models\Reviews;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description', 'image', 'price', 'stock'];
    protected $primaryKey = 'id';
    protected $table = 'products';
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
}
