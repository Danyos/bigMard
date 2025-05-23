<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGalleriesModel extends Model
{
    protected $table = 'item_galleries_models'; // Համոզվիր, որ ճիշտ է
    protected $fillable = ['image_path', 'item_id'];
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(ItemModel::class);
    }
}
