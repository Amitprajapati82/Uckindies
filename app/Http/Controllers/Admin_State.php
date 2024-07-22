<?php

namespace App\Http\Controllers;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Helpers;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse as BaseRedirectResponse;

class Admin_State extends Controller
{
    //View

    public function view(Request $request)
    {  
        $data = '';
        $state_id = !empty($request->query('role_id')) ? $request->query('role_id') : '';
        if (Session::has('State')) {
            # code...
            $data = State::where('id',$state_id)->where('delete_status', '1')->orderBy('ID', 'ASC')->get();
        }elseif (Session::has('Admin')) {
            $data = State::where('delete_status', '1')->orderBy('ID', 'ASC')->get();
            # code...
        }

        // if (!empty($state_id)) {
            
        //     // $data = Address::select('addresses.*', 'states.state_name as state_name')
        //     //     ->join('states', 'addresses.state_id', '=', 'states.id')
        //     //     ->where('addresses.delete_status', '1')
        //     //     ->where('addresses.state_id', $state_id)
        //     //     ->orderBy('addresses.ID', 'ASC')
        //     //     ->get();
                
        //     $data = Address::select('addresses.*', 'states.state_name as state_name')
        //         ->leftJoin('approvals as ap', 'addresses.ID', '=', 'ap.address_id')
        //         ->join('states', 'addresses.state_id', '=', 'states.id')
        //         ->where('addresses.delete_status', '1')
        //         ->where('addresses.state_id', $state_id)
        //         ->where('ap.status', 1) // Filter approvals where status is 1
        //         ->orderBy('addresses.ID', 'ASC')
        //         ->distinct('addresses.ID')
        //         ->get();

        // }
        // else
        // {
            
            // $data = State::where('id',$state_id)->where('delete_status', '1')->orderBy('ID', 'ASC')->get();
        // }
        // return $data;
        return view('admin/states', ['data'=>$data]);

    }


    //Add

    public function add(Request $req)
    {   
            
        $State = new State; 
        $State->state_name =  $req->input('StateTitle');
        
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        
        $State->created_at =  $date;
        $State->updated_at =  $date;
        $result = $State->save();
        
        if($result)
        {
            return Redirect()->back()->with('success','State added successfully');
        }
        else
        {
            return Redirect()->back()->with('error','Something Went Wrong');
        }
        
    }

    public function get($id)
    {
        $status = '1';
        return State::where('ID',$id)->where('delete_status',$status)->get();
    }
    
      
    //UPDATE
        
      public function update(Request $req)
      {
        $id = $req->input('state_id');
        $state_name = $req->input('EditStateTitle');
        
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        
        $result = State::where('ID',$id)->update(['state_name'=>$state_name, 'updated_at'=>$date]);
        
        if($result)
        {
            return Redirect()->back()->with('success','State updated successfully');
        }
        else
        {
            return Redirect()->back()->with('error','Something Went Wrong');
        }
      }
      
      
    // delete
    public function delete_state(Request $request)
    {
        // return 'fhdfbfd';
        $id = $request->input('id');
        // return $id;
        $status = '0';
        
        $result = Address::where('ID',$id)->update(['delete_status'=>$status]);
        
        if($result)
        {
            return response()->json([$result,'success'=>'State deleted successfully']);
        }
        else
        {
            return response()->json(['error'=>'Something went to wrong']);
        }
    }
    
    
    public function status(Request $req,$ID)
    {
        $statusdata = DB::select("select status from states where ID='$ID' ");
        foreach($statusdata as $key=>$value)
        {
            $status = $value->status;
        }
        
        if($status == '1')
        {
            $status='0';
        }
        else
        {
            $status='1';
        }
        
        $result = State::where('ID',$ID)->update(['status'=>$status]);
        
        if($result)
        {
            return Redirect()->back()->with('success','Status updated successfully');
        }
        else
        {
            return Redirect()->back()->with('error','Something Went Wrong');
        }
        
    }
    
    // Validation start
    
    public function checkadd($name)
    {
        $data = DB::select("SELECT * FROM states WHERE state_name='$name' AND delete_status<>'0' ");
        if($data)
        {
           return $status = 'error';
        }
        else
        {
           return $status = 'success';
        }
    }
    
    public function checkedit($id,$name)
    {
        $data = DB::select("SELECT * FROM states WHERE ID<>'$id' AND state_name='$name' AND delete_status<>'0' ");
        if($data)
        {
           return $status = 'error';
        }
        else
        {
           return $status = 'success';
        }
    }

    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        $role = $request->role;

        if ($role == 'admin') {
            $user->assignRole('admin');
        } elseif ($role == 'state') {
            $user->assignRole('state');
        } elseif ($role == 'center') {
            $user->assignRole('center');
        }

        return redirect()->back()->with('success', 'Role assigned successfully!');
    }
    
}

?>