<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Validator;
use Hash;
use Session;

class LoginController extends Controller
{
    public function loginPanel()
    {
        
        if(Session::has('adminId') && Session::get('type') == 'admin'){
            return redirect()->route('admin.dashboard');
        }

        if(Session::has('branchId') && Session::get('type') == 'branch'){
            return redirect()->route('branchDashboard');
        }

        return view('login.login');
    }

    public function loginPanelPost(Request $request) 
    {
        $validate = $request->validate([
                        'username' => 'required|min:3',
                        'password' => 'required|min:5',
                    ]);

        if($validate == true){
            $dbData = AdminModel::whereusername($request->username)
                ->wherepswd(md5($request->password))
                ->first();

            if($dbData){
                
                if($dbData->typ == 'admin'){
                   
                    if($dbData->status == 'active'){

                        Session::put('type', 'admin');
                        Session::put('adminId',$dbData->id);        
                        return redirect('admin/dashboard');
                    
                    }else{
                        return redirect()->back()
                        ->with('error','You are block by admin.');
                    }


                }elseif($dbData->typ == 'branch'){

                    if($dbData->status == 'active'){
                        
                        Session::put('type', 'branch');
                        Session::put('branchId', $dbData->id);
                        return redirect('branch/dashboard');

                    }else{
                        return redirect()->back()
                        ->with('error','You are block by admin.');
                    }
                }else{
                    return redirect()->back()
                    ->with('error','You have not access');
                }
                
            }else{
                return redirect()->back()->with('error','Oops! You have entered invalid credentials');
            }
        }
           
    }

    public function logoutUrl()
    {
        Session::flush();
        return redirect()->route('loginPanel')->with('success','logout successfully');
    }
}
