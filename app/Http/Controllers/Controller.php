<?php

namespace App\Http\Controllers;

use App\Models\Models\PageStatusModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $status=PageStatusModel::first();
        if($status->status=="inactive"){
            abort(500);
        }
    }
}
