<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOtherInformate extends Model
{
    use HasFactory;
    protected $fillable=[
        'item_id',
        'imgText',
        'youtubUrl',
        'coverImages',
        'underImages',
        'middle_picture',];
}
