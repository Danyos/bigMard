<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Models\PageStatusModel;
use Illuminate\Http\Request;

class PageStatusController
{
    public function update()
    {
        $status=PageStatusModel::first();
        $x=$status->status;
        if($x==='active'){
            $x='inactive';
        }else{
            $x='active';
        }

        $status->update(['status'=>$x]);
        return response()->json(['status'=>$x]);
    }
}
