<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginPost(Request $request){
        $credentials = $request->only('email','password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('listing.index',['model'=>'User']);
        }else {
            echo " dang nhap sai";exit;
        }
    }
    public function dashboard()
    {
        $adminUser = Auth::guard('admin')->user();
        return view('admin.dashboard',['user'=>$adminUser]);

    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login'); 
    }
    public function static(){
        $adminUser = Auth::guard('admin')->user();
        return view('admin.static',['user'=>$adminUser]);

    }
        
}
