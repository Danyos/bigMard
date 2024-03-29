<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallupModel extends Model
{
    use HasFactory;
    protected $fillable=['item_id', 'type_id','phone','status','name'];
}
