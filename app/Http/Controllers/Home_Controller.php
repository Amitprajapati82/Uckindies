<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{ Address,State};
use App\Models\Admin;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Paginator;
// use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Home_Controller extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function about()
    {
        return view('about');
    }
    public function appointment()
    {
        return view('appointment');
    }
    public function callToAction()
    {
        return view('call-to-action');
    }
    public function classes()
    {
        return view('classes');
    }
    // public function contact()
    // {
    //     return view('contact');
    // }    
    
    public function facility()
    {
        return view('facility');
    }    
    
    public function team()
    {
        return view('team');
    }
    
    public function testimonial()
    {
        return view('testimonial');
    }
    
    public function not_found()
    {
        return view('404');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function franchise()
    {
        return view('franchise');
    }
     public function enrollment()
    {
        return view('enrollment');
    }
    public function centers()
    {
        $data = DB::select("SELECT a.*, s.state_name  FROM `addresses` AS a LEFT JOIN states AS s ON a.state_id = s.ID WHERE a.status = 1 AND a.delete_status=1 ");
        $State = State::where('delete_status', '1')->where('status', '1')->orderBy('ID', 'ASC')->get();
        // return 'hdfs';
        
        return view('centers', ['data'=>$data,'State'=>$State]);
    }
    public function awards()
    {
        return view('awards');
    }    
     public function join_us()
    {
        return view('join_us');
    }    
    
    public function state($state)
    {
        $temp = str_replace('_', ' ', $state);
        $state = ucwords($temp);
        // return $temp;
        return view('states', ['state'=>$state]);
    }    
    
     public function login()
    {   
        $admin = Admin::where('status','1')->get();
        $State = State::where('delete_status', '1')->where('status', '1')->orderBy('ID', 'ASC')->get();
        // return $admin;
        return view('login',compact('State','admin'));
    }    
    
     public function forgot_password()
    {
        return view('forgot_password');
    }    
    
    public function AdminDashboard()
    {
        $State = State::where('delete_status',1)->count();
        $Units = Address::where('delete_status',1)->count();
        // return $State;
        return view('admin.index',compact('State','Units'));
    } 
    public function StateDashboard()
    {
        // return 'gvsdgigdgdi';
        return view('state.index');
    } 
    public function CenterDashboard()
    {
        // return 'gvsdgigdgdi';
        return view('center.index');
    } 

    public function getBranches(Request $request)
    {
        // return 'bkbk';
        $stateId = $request->id;
        $state = Address::where('state_id',$stateId)->select('id','center')->get();
        // return $state;
        return response()->json($state);
    }

    public function getUnitsData(Request $request)
    {
        $id = $request->input('role_id');
        // $stateId = $request->id;
        $data = Address::where('state_id',$id)->where('delete_status',1)->get();
        // return $units;
        return view('admin.address',compact('data'));
    }
}

?>  

