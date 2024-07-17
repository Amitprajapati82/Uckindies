<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{ Address,State};
use App\Models\Admin;
use App\Models\Approval;
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
        // return $data;
        
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
        $State_id = null;

        if (Session::has('State')) {

            $data = Session::get('State');
            $State_id =  $data->role_id;

        }elseif(Session::has('Admin')){

            $data = Session::get('Admin');
            $State_id =  $data[0]->role_id;
            
        }
        
        $temp = str_replace('_', ' ', $state);
        $state = ucwords($temp);

        $state = State::where('id',$State_id)->where('delete_status',1)->get();

        // return $state;
        // return $State_id;
        
        return view('states1', ['state'=>$state]);
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
        
        // return $request;
        return view('admin.index',compact('State','Units'));
    } 
    public function StateDashboard()
    {
        $data = Session::get('State');
        $state_id = $data->role_id;

        $State = State::where('id',$state_id)->where('delete_status',1)->count();

        $Units = Address::leftJoin('states', 'addresses.state_id', '=', 'states.id')
        ->leftJoin(DB::raw('(select address_id, status from approvals where id in (select max(id) from approvals where status = 1 group by address_id)) as approval_status'), function ($join) {
            $join->on('addresses.ID', '=', 'approval_status.address_id');
        })
        ->where('addresses.state_id', $state_id)
        ->where('approval_status.status', 1)
        ->where('addresses.delete_status', 1)
        ->count();

        return view('state.index',compact('State','Units'));
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

