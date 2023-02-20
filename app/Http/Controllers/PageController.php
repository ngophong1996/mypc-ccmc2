<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Requests;
use App\Mail\Wifisent;
use App\Mail\Checkbill;
use Illuminate\Support\Facades\Mail;


class PageController extends Controller
{
    public function none(){
        return view('small.none');
    }
    public function new(){
        return view('small.new');
    }
    public function old(){
        return view('small.old');
    }
    public function rent(){
        return view('small.rent');
    }
    public function mypc(){
        $mypc= DB::table('mypcs')
        ->where('username', Auth::user()->name)
        ->first();
        return view('small.mypc',[
            'mypc'=>$mypc,
        ]);
    }
    public function wifi(){
        return view('small.wifi');
    }
    public function mess(){
        return view('small.mess');
    }
    public function wifipost(Request $request) {
  
        DB::table('wifis')->insert([
        'useremail' => Auth::user()->email,
        'address' => $request->address,
        'os'=> $request->os,
        'description'=> $request->description,
        ]);
        Session::flash('flash_message','登録成功');
        return redirect()->route("wifi");
 
    }
    public function billpost(Request $request) {
  
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/img' ;
            $file->move($destinationPath,$fileName);

            DB::table('mypcs')->where('username', Auth::user()->name)->update(['paymentstate' => 1,'image'=>$fileName]);
           
    		
           
        $mypc1= DB::table('mypcs')
        ->where('username', Auth::user()->name)
        ->first();
        Session::flash('flash_message','アップロード成功、現在進行中です');
        return redirect()->route("mypc",[
            'mypc'=>$mypc1,
        ]);
 
    }
    public function mypcpost(Request $request) {

        $mypc1= DB::table('mypcs')
        ->where('username', Auth::user()->name)->get();
        
        if(count($mypc1)==0){
            switch($request->mypccode){
                case '0': DB::table('mypcs')->insert([
                            'username' => Auth::user()->name,
                            'useremail' => Auth::user()->email,
                            'class' => Auth::user()->class,
                            'option'=> "自分のノートPC",
                            'device' => "自分のノートPC",
                            'wifi'=> 0,
                            'total'=> 0,
                            ]);break;
                case '1': DB::table('mypcs')->insert([
                            'username' => Auth::user()->name,
                            'useremail' => Auth::user()->email,
                            'class' => Auth::user()->class,
                            'option'=> "自分のノートPC",
                            'device' => "自分のノートPC",
                            'wifi'=> 1,
                            'total'=> 8000,
                            ]);break;
                case '2': DB::table('mypcs')->insert([
                            'username' => Auth::user()->name,
                            'useremail' => Auth::user()->email,
                            'class' => Auth::user()->class,
                            'option'=> "新型ノート PC",
                            'device' => "富士通製 LIFEBOOKU7311/F",
                            'wifi'=> 0,
                            'total'=> 130000,
                            ]);break;
                case '3': DB::table('mypcs')->insert([
                            'username' => Auth::user()->name,
                            'useremail' => Auth::user()->email,
                            'class' => Auth::user()->class,
                            'option'=> "新型ノート PC",
                            'device' => "富士通製 LIFEBOOKU7311/F",
                            'wifi'=> 1,
                            'total'=> 138000,
                            ]);break;
                case '4': DB::table('mypcs')->insert([
                            'username' => Auth::user()->name,
                            'useremail' => Auth::user()->email,
                            'class' => Auth::user()->class,
                            'option'=> "中古のノートPC",
                            'device' => "Panasonic Let's note CF-MX5",
                            'wifi'=> 0,
                            'total'=> 66000,
                            ]);break;
                case '5': DB::table('mypcs')->insert([
                            'username' => Auth::user()->name,
                            'useremail' => Auth::user()->email,
                            'class' => Auth::user()->class,
                            'option'=> "中古のノートPC",
                            'device' => "Panasonic Let's note CF-MX5",
                            'wifi'=> 1,
                            'total'=> 74000,
                            ]);break;
                case '6': DB::table('mypcs')->insert([
                            'username' => Auth::user()->name,
                            'useremail' => Auth::user()->email,
                            'class' => Auth::user()->class,
                            'option'=> "学校のノートPC",
                            'device' => "Microsoft Surface Go 2",
                            'wifi'=> 0,
                            'total'=> 18000,
                            ]);break;
            }
            Session::flash('flash_message1','登録が完了しました');
            $mypc= DB::table('mypcs')
            ->where('username', Auth::user()->name)
            ->first();
            return redirect()->route("mypc",[
                'mypc'=>$mypc,
            ]);
        }else{
            Session::flash('flash_message2','失敗しました。各アカウントは 1 回しか登録できません');
            $mypc= DB::table('mypcs')
            ->where('username', Auth::user()->name)
            ->first();
            return redirect()->route("mypc",[
                'mypc'=>$mypc,
            ]);
        
        }
    }
    public function messpost(Request $request){
        

        DB::table('messes')->insert([
            'username' => Auth::user()->name,
            'useremail' => Auth::user()->email,
            'class' => Auth::user()->class,
            'content' => $request->mess,
            ]);
        Session::flash('flash_message','送信成功');
        return redirect()->route('mess');
    }
    public function mypcdestroy($id){
        $mypc1= DB::table('mypcs')->where('id', $id);
        $mypc1->delete();

        Session::flash('flash_message3','削除しました');

        $mypc= DB::table('mypcs')
            ->where('username', Auth::user()->name)
            ->first();
        return redirect()->route("mypc",[
                'mypc'=>$mypc,
            ]);
    }

    public function checkbill(Request $request){
  
        $mypcid= $request->mypcid;
        DB::table('mypcs')->where('id', $mypcid)->update(['paymentstate' => 2]);
        $usermail = $request->usermail;
        Mail::to($usermail)->send(new Checkbill());

        return redirect()->route('listing.index',['model'=>'mypc']);
     
    }

    public function wifisent(Request $request){
        $wifiid= $request->wifiid;
        DB::table('wifis')->where('id', $wifiid)->update(['wifisent' => 1]);
        $usermail = $request->usermail;
        Mail::to($usermail)->send(new Wifisent());

        return redirect()->route('listing.index',['model'=>'wifi']);
    }
   
}

