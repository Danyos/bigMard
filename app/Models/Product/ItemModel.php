<?php

namespace App\Models\Product;

use App\Models\Category\CategoryModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;
    protected $fillable=['category_id','name','description', 'price','discount', 'auction_end_time','status','count'];

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

}
