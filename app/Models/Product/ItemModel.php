<?php

namespace App\Models\Product;

use App\Models\Category\CategoryModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;
    protected $fillable=['category_id','name','description',

        'price','discount', 'auction_end_time','status','count','order_time','new','best'];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }
    public function ItemQuestion()
    {
        return $this->hasMany(ProductQuestionInformate::class,'item_id','id');
    }
    public function ItemGalleries()
    {
        return $this->hasMany(ItemGalleriesModel::class,'item_id','id');
    }
    public function ItemGallery()
    {
        return $this->hasOne(ItemGalleriesModel::class,'item_id','id');
    }
    public function OtherInformation()
    {
        return $this->hasOne(ItemOtherInformate::class,'item_id','id');
    }
    public function scopeOrdered($query)
    {
        return $query->orderByRaw("
            CASE
                WHEN order_time IS NOT NULL AND order_time > NOW() THEN 0
                ELSE 1
            END, order_time ASC
        ");
    }
}
