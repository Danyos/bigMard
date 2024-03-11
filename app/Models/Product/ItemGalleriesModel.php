<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGalleriesModel extends Model
{
    protected $fillable=['item_id', 'image_path'];
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(ItemModel::class);
    }
}
