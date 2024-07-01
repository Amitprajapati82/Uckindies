<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Http\Controllers\Helpers;  //Global Variable 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class login_controller extends Controller
{
    //Login
    public function login(Request $req)
    {
        // $selectValue = $req->input("roleId");
        // $credentials = $req->only('email', 'password', 'selectState', 'selectBranch');
        $role = json_decode($req->input('selectRole'), true);
        
        $state = !empty($req->input("selectState")) ? $req->input("selectState") : '' ;
        $center = !empty($req->input("selectBranch")) ? $req->input("selectBranch") : '' ;
        $email = $req->input('email');
        $pwd = $req->input('password');
        $role_name = "";
        $roleId = $role['id'];
        $roleName = $role['name'];
        $admin = Admin::find($roleId);
        \Log::info('Request Data', $req->all());
        \Log::info('Clearing previous session data');
        $req->session()->forget(['Admin', 'State', 'Center']);
        
        if ($roleName == 'Admin') {
            // $admin = Admin::;
            
            $AdminExist = DB::select("SELECT * FROM `admin` WHERE id='$roleId' AND  password='$pwd' AND (email='$email') ");
            if($AdminExist)
            {
                $req->session()->put($roleName,$AdminExist);
                \Log::info('Session Data', session()->all());
                $req->session()->flash('success',"Login successful");   
                // return 'bdbkivbd';
                return redirect('admin/dashboard');
            }
            else
            {
                return Redirect()->back()->with('error','Login invalid');
            }
        }else if ($roleName == 'State') {
            
            if (!empty($state)) {
                
                
                $AdminExist = DB::table('admin')->where('id',$roleId)->where('email', $email)->where('password', $pwd)->where('role_id',$state ) // Adjust this condition based on your database schema
                ->first();
                // return $AdminExist;
                
                if($AdminExist)
                {
                    $req->session()->put($roleName,$AdminExist);
                    // dd(session()->all());die;
                    $req->session()->flash('success',"Login successful");  
                    \Log::info('Session Data', session()->all()); 
                    return redirect('state/dashboard');
                }
                else
                {
                    return Redirect()->back()->with('error','Login invalid');
                }
            }
        }elseif ($roleName == 'Center') {
            if (!empty($center)) {
                // return 'hgifd';
                
                
                $AdminExist = DB::table('admin')->where('id',$roleId)->where('email', $email)->where('password', $pwd)->where('role_id',$center ) // Adjust this condition based on your database schema
                ->first();
                // return $AdminExist;            

                // return $role;
                if($AdminExist)
                {
                    $req->session()->put($roleName,$AdminExist);
                    $req->session()->flash('success',"Login successful"); 
                    // return dd(Session::all()); 
                    \Log::info('Session Data', session()->all());
                    return redirect('center/dashboard');
                }
                else
                {
                    return Redirect()->back()->with('error','Login invalid');
                }
            }
        }
        // $AdminExist = DB::select("SELECT * FROM `admin` WHERE password='$pwd' AND (email='$email') ");
        
                    
        
      
    }
        

       
    //Logout
    public function admin_logout()
    {
        // return Session::all();die;
        if( Session::has('State') ||  Session::has('Admin') || Session::has('Center'))
        {
            session()->pull('state');
            session()->pull('Admin');
            session()->pull('Center');
            return redirect('login');
        }
        else
        {
            return view('404');
        }

    }
    
    

       
    
}

?>