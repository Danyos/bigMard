<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetailsModel extends Model
{
    use HasFactory;
    public $table = 'item_details_models';
    protected $fillable = [
        'product_id',
        'key',
        'value',
    ];
    public function ItemInfo()
    {
        return $this->hasOne(ItemModel::class,'id','product_id');
    }
}
