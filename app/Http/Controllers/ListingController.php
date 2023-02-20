<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request, $modelName)
    {
        $adminUser = Auth::guard('admin')->user();
        $model = '\App\Models\\'.ucFirst($modelName);
        $model= new $model;

        $configs = $model->listingconfigs();
     
        $records= $model::paginate(5);

   
        return view('admin.listing',[
            'user'=>$adminUser,
            'records'=>$records,
            'configs'=>$configs,
            'title'=>$model->title,
        ]);
    }
}
