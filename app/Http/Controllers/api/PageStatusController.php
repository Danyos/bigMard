<?php

namespace App\Http\Controllers\api;

use App\Models\Product\PageStatusModel;

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
