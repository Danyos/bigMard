<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageStatusModel extends Model
{

    use HasFactory;
    protected $fillable=['status'];
}
