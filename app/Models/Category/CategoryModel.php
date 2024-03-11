<?php

namespace App\Models\Category;

use App\Models\Product\ItemModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function products()
    {
        return $this->hasMany(ItemModel::class);
    }
}
